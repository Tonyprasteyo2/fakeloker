<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

    // logout
    public function Logout()
    {
        session()->regenerate();
        session()->flush();
        Auth::logout();
        return redirect('login');
    }

    // dasboard 
    public function Dasboard(Request $request)
    {
        $title = "Dasboard";
        return view('masterweb.index', compact("title"));
    }

    // profil
    public function Profil(Request $request)
    {
        $title = "Profil";
        $session_id = $request->session()->start();
        $data = DB::table('useradmins')->select()->join('aktifasis', 'aktifasis.user_id', '=', 'useradmins.id')->where('user_id', $session_id)->get();
        return view('masterweb.profil', compact("title", "data"));
    }

    // update user admin
    public function UpdateUser(Request $request)
    {
        $validatora = Validator::make($request->all(),[
            "nama" => "required",
            "foto" => "required"
        ]);
        if ($validatora->fails()) {
            Alert::warning('Gagal', 'Silakan Upload foto lagi!');
            return redirect('profil');
        }
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
                        return redirect()->back()->with('message', 'berhasil');
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
    $data = DB::table('useradmins')->select()->join('aktifasis', 'aktifasis.user_id', '=', 'useradmins.id')->get();
    return view("masterweb.user", compact("title", "data"));
}

// delete user member
public function DeleteUser(Request $request)
{
    $id = $request->input('id');
    $hapus = DB::table('aktifasis')->leftJoin("useradmins", "aktifasis.user_id", "=", "useradmins.id")->where("user_id", $id);
    DB::table('useradmins')->where("id", $id)->delete();
    $hapus->delete();
    return response()->json([
        "status" => 200,
        "title" => "Berhasil Hapus User"
    ]);
}

// view user member
public function ViewUser(Request $request)
{
    $update = htmlspecialchars($request->input('id'));
    $view = DB::table('useradmins')->where('id', $update)->get();
    return json_encode($view);
}

// update user member
public function UpdateMember(Request $request)
{
    $this->validate($request, [
        "view_pass" => "required",
        "view_level" => "required"
    ]);
    $id = $request->input('id_member');
    $namaMember = htmlspecialchars($request->input('nama_member'));
    $emailMember = $request->input('view_email');
    $passwordMember = $request->input('view_pass');
    $roleMember = $request->input('view_level');
    if (filter_var($emailMember, FILTER_VALIDATE_EMAIL)) {
        $update = DB::table('useradmins')->where('id', $id)->update([
            "nama_lengkap" => $namaMember,
            "email" => $emailMember,
            "password" => Hash::make($passwordMember),
            "role" => $roleMember,
        ]);
        $dataEmail = [
            "email" => $emailMember,
            "password" => $passwordMember,
        ];
        Mail::to($emailMember)->send(new SendMail($dataEmail));
        return response()->json([
            "status" => 200,
            "title" => "Sukses",
            "text" => "Berhasil Update User"
        ]);
    } else {
        return response()->json([
            "status" => 300,
            "title" => "Gagal",
            "text" => "Silakan Coba Kembali"
        ]);
    }
}
}
