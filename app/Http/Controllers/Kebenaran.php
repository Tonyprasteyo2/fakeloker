<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;


class Kebenaran extends Controller
{
    // login prosess
    public function LoginUser(Request $request)
    {
        $valid = $request->validate(['email' => 'required', 'password' => 'required']);
        $email = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL);
        $filterregex = "/(?=.*[a-zA-Z])(?=.*[0-9])\w+/";
        if (preg_match_all($filterregex, $request->input('password'))) {
            if (Auth::attempt($valid)) {
                $user = Auth::user();
                if ($user->role == "admin") {
                    return response()->json([
                        'status' => 200,
                        'judul' => 'Berhasil',
                    ]);
                } elseif ($user->role == "member") {
                    return response()->json([
                        'status' => 300,
                        'judul' => 'Sukses'
                    ]);
                }
            } else {
                return response()->json(["status" => "pas"]);
            }
        } else {
            return response()->json(["status" => "gagal"]);
        }
    }
    public function Logout()
    {
        session()->regenerate();
        session()->flush();
        Auth::logout();
        return redirect('login');
    }
    public function Dasboard(Request $request)
    {
        $title = "Dasboard";
        return view('masterweb.index', compact("title"));
    }
    public function Profil(Request $request)
    {
        $title = "Profil";
        $session_id = $request->session()->start();
        $data = DB::table('useradmins')->select()->join('aktifasis','aktifasis.user_id','=','useradmins.id')->where('user_id',$session_id)->get();
        return view('masterweb.profil', compact("title","data"));
    }

    // update user admin
    public function UpdateUser(Request $request)
    {
        $this->validate($request, [
            "nama" => "required",
            "foto" => "required"
        ]);
        $namefilter = "/(^([a-zA-z]))/";
        $name = $request->input('nama');
        $foto = $request->file('foto');
        $id = $request->input('id');
        $passwarod_lama = $request->input('pas_lama');
        if (preg_match($namefilter, $name) && preg_match("/(?=.*[a-zA-Z])(?=.*[0-9])/", $passwarod_lama)) {
            $ekstensi = strtolower($foto->getClientOriginalExtension());
            if ($ekstensi == "png" || $ekstensi == "jpg") {
                $namefoto = $foto->getClientOriginalName();
                if (password_verify($passwarod_lama, Auth::user()->password)) {
                    $pass_baru = htmlentities($request->input('pas_baru'));
                    if (preg_match("/(?=.*[a-zA-Z])(?=.*[0-9])/", $pass_baru)) {
                        $move = $foto->move(public_path('/foto'), $namefoto);
                        $update = DB::table('useradmins')->where('id', $id)->update([
                            "nama_lengkap" => $name,
                            "password" => Hash::make($pass_baru),
                            "foto" => $namefoto,
                        ]);
                        Alert::success('Sukses', 'Silakan Login Kembali');
                        return redirect('login');
                    } else {
                        Alert::info('Gagal', 'Password Berupa Huruf Dan Angka !');
                        return redirect('profil');
                    }
                } else {
                    Alert::info('Gagal', 'Password Tidak Sama');
                    return redirect('profil');
                }
            }
        } else {
            Alert::warning('Gagal', 'Silakan Coba Kembali');
            return redirect('profil');
        }
    }

    // view user member
    public function UserData(Request $request)
    {
        $title = "Data User";
        $data = DB::table('useradmins')->select()->join('aktifasis','aktifasis.user_id','=','useradmins.id')->get();
        return view("masterweb.user",compact("title","data"));
    }

    // delete user member
    public function DeleteUser(Request $request)
    {
        $id = $request->input('id');
        $hapus = DB::table('aktifasis')->leftJoin("useradmins","aktifasis.user_id","=","useradmins.id")->where("user_id",$id);
        DB::table('useradmins')->where("id",$id)->delete();
        $hapus->delete();
        return response()->json([
            "status"=>200,
            "title"=>"Berhasil Hapus User"
        ]);
    }

    // view user member
    public function ViewUser(Request $request)
    {
        $update = htmlspecialchars($request->input('id'));
        $view = DB::table('useradmins')->where('id',$update)->get();
        return json_encode($view);
    }

    // update user member
    public function UpdateMember(Request $request)
    {   
        $this->validate($request,[
            "view_pass"=>"required",
            "view_level"=>"required"
        ]);
        $id = $request->input('id_member');
        $namaMember = htmlspecialchars($request->input('nama_member'));
        $emailMember = $request->input('view_email');
        $passwordMember = $request->input('view_pass');
        $roleMember = $request->input('view_level');
        if (filter_var($emailMember,FILTER_VALIDATE_EMAIL)) {
            $update = DB::table('useradmins')->where('id',$id)->update([
                "nama_lengkap" => $namaMember,
                "email"=>$emailMember,
                "password"=>Hash::make($passwordMember),
                "role"=>$roleMember,
            ]);
             $dataEmail = [
                 "email"=>$emailMember,
                 "password"=>$passwordMember,
             ];
            Mail::to($emailMember)->send(new SendMail($dataEmail));
            return response()->json([
                "status"=>200,
                "title"=>"Sukses",
                "text"=>"Berhasil Update User"
            ]);
        }else {
            return response()->json([
                "status"=>300,
                "title"=>"Gagal",
                "text"=>"Silakan Coba Kembali"
            ]);
        }
    }
    public function Informasi()
    {
        $title = "Add Informasi";
        return view('masterweb.add',compact("title"));
    }

    // add user member
    public function AddUserNew(Request $request)
    {
        $this->validate($request,[
            "namanew"=>"required",
            "pasnew"=>"required"
        ]);
        $namauserbaru = htmlspecialchars($request->input('namanew'));
        $emailuserbaru = $request->input('emailnew');
        $passwordusernew = htmlspecialchars($request->input('pasnew'));
        $roleusernew = $request->input('role_member');
        if (filter_var($emailuserbaru,FILTER_VALIDATE_EMAIL)) {
            if (preg_match("/(?=.*[a-zA-Z])(?=.*[0-9])/",$passwordusernew)) {
                $addusernew = DB::table('useradmins')->insert([
                    "nama_lengkap" => $namauserbaru,
                    "email"=>$emailuserbaru,
                    "password"=>Hash::make($passwordusernew),
                    "role" => $roleusernew,
                    "foto"=>"user.png"
                ]);
                return response()->json([
                    "status" =>200,
                    "title"=>"Berhasil",
                    "text"=>"Sukses Buat Akun"
                ]);
            }
        }
    }

    // get search alamat iin google
    public function curl(Request $request)
    {
        $search = htmlentities($request->input('gugel'));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://google.serper.dev/search',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"q":"'.$search.'","gl":"id","hl":"id","autocorrect":true}',
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: 1702350c579658e5fe69187632c930e96d5ad0e3',
                'Content-Type: application/json',
            )
        ));
        $eks = curl_exec($curl);
        curl_close($curl);
        return json_encode($eks);
    }

    // add alamat lowongan
    public function AddAlamat(Request $request)
    {
        $aw = $request->input('judul');
        return json_encode($aw);
    }
}