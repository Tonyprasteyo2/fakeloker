<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
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
    public function Dasboard()
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

    // update user profil admin
    public function UpdateUser(Request $request)
    {
        $validatora = Validator::make($request->all(), [
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

    // view informasi add alamat
    public function Informasi()
    {
        $title = "Add Informasi";
        return view('masterweb.add', compact("title"));
    }

    
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
            CURLOPT_POSTFIELDS => '{"q":"' . $search . '","gl":"id","hl":"id","autocorrect":true}',
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: 1702350c579658e5fe69187632c930e96d5ad0e3',
                'Content-Type: application/json',
            )
        ));
        $eks = curl_exec($curl);
        curl_close($curl);
        return json_encode($eks);
    }

    // fungsi filter string input
    public function filterString($data)
    {
        $data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
        $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

        do {
            $old_data = $data;
            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        } while ($old_data !== $data);
        return $data;
    }

    // add alammmat lowongan
    public function AddAlamat(Request $request)
    {
        $judul = $this->filterString($request->input('judul'));
        $statuskebenaran = $this->filterString($request->input('statusloker'));
        $alamat = $this->filterString($request->input('alamatpt'));
        $alamatbaru = str_replace(array('&','<','>'), array('&amp;','&lt;','&gt;'), $alamat);
        $title = $this->filterString($request->input('titlelink'));
        $link = filter_var($request->input('link'),FILTER_VALIDATE_URL);
        $cek = DB::table('alamat_perusahaans')->where('alamat', '=', $alamatbaru)->count();
        if($request->method() == 'POST'){
            if ($cek > 0) {
                return response()->json([
                    "status"=>320,
                ]);
            }else {
                DB::table('alamat_perusahaans')->insert([
                    'nama_perusahaan' => $judul,
                    'alamat' => $alamatbaru,
                    'url' => $link,
                    'status' => $statuskebenaran,
                    'title_judul' => $title,
                ]);
                return response()->json([
                    "status"=>200,
                ]);
            }
        }
    }

    // view alamat perusahaan
    public function ViewInformasi()
    {
        $title="Informasi Alamat";
        $data = DB::table('alamat_perusahaans')->select("*")->get();
        return view('masterweb.informasi',compact("title","data"));
    }

    // delete alamat
    public function Deletealamat(Request $request)
    {
        DB::table('alamat_perusahaans')->where('id',trim($request->input("id")))->delete();
        return response()->json(["status"=>200]);
    }

    // view edit alamat
    public function Editalamat($id)
    {
        $id = $this->filterString($id);
        $pisah = substr($id,-14,1);
        $datadb = DB::table('alamat_perusahaans')->where('id','=',$pisah)->get();
        $title = "Edit Informasi Alamat";
        return view('masterweb.editalamat',compact("title","datadb"));
    }

    // update alamat
    public function UpdateAlamat(Request $request)
    {
        $idalamat = $this->filterString($request->input('id'));
        $editjudul = $request->input('juduledit');
        $titleedit =  $this->filterString($request->input('titlebaru'));
        $urledit = $this->filterString($request->input("urledit"));
        $alamatedit = $this->filterString($request->input("alamatedit"));
        $statusedit = $this->filterString($request->input("status"));
        $valid = Validator::make($request->all(),[
            "juduledit"=>"required",
             "titlebaru"=>"required",
             "urledit"=>"required|url",
            "alamatedit"=>"required",
        ]);
        if ($valid->fails()) {
            return response()->json([
                "status"=>"gagalform",
            ]);
        }
        $alamatedithasil = str_replace(array('&','<','>'), array('&amp;','&lt;','&gt;'), $alamatedit);
        $cekalamatbaru = DB::table('alamat_perusahaans')->where('alamat','=',$alamatedithasil)->count();
        if ($request->isMethod('POST')) {
            if ($cekalamatbaru > 0) {
               return response()->json(["status"=>"sama"]);
            }else {
                DB::table('alamat_perusahaans')->where('id',$idalamat)->update([
                    "nama_perusahaan"=>$editjudul,
                    "alamat"=>$alamatedithasil,
                    "url"=>$urledit,
                    "status"=>$statusedit,
                    "title_judul"=>$titleedit,
                ]);
                return response()->json(["status"=>"berhasil"]);
            }
        }

    }
}
