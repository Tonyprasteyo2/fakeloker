<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
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
    public function Dasboard(Request $request)
    {
        $title = "Dasboard";
        $totalVisit = DB::table('visitors')->select("*")->get();
        $totalalamat = DB::table('alamat_perusahaans')->select("*")->count();
        for ($i = 1; $i < 13; $i++) {
            $aw = DB::table('visitors')->selectRaw('count(id_visit) as hasil')->where('bulan', $i)->count();
            $visit[] = $aw;
        }
        return view('masterweb.index', compact("title", "totalVisit", "totalalamat", "visit"));
    }

    // profil
    public function Profil(Request $request)
    {
        $title = "Profil";
        return view('masterweb.profil', compact("title"));
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
                        session()->regenerate();
                        session()->flush();
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


    public function Getapi(Request $request)
    {
        return eval(base64_decode('ICRkYiA9IERCOjp0YWJsZSgnYXBpa2V5cycpLT5zZWxlY3QoImFwaSIpLT5nZXQoKTsKICAgICAgICBmb3JlYWNoICgkZGIgYXMgJHJlc2FwaSk7CiAgICAgICAgJHNlYXJjaCA9IGh0bWxlbnRpdGllcygkcmVxdWVzdC0+aW5wdXQoJ2d1Z2VsJykpOwogICAgICAgICRjdXJsID0gY3VybF9pbml0KCk7CiAgICAgICAgY3VybF9zZXRvcHRfYXJyYXkoJGN1cmwsIGFycmF5KAogICAgICAgICAgICBDVVJMT1BUX1VSTCA9PiAnaHR0cHM6Ly9nb29nbGUuc2VycGVyLmRldi9zZWFyY2gnLAogICAgICAgICAgICBDVVJMT1BUX1JFVFVSTlRSQU5TRkVSID0+IHRydWUsCiAgICAgICAgICAgIENVUkxPUFRfRU5DT0RJTkcgPT4gJycsCiAgICAgICAgICAgIENVUkxPUFRfTUFYUkVESVJTID0+IDEwLAogICAgICAgICAgICBDVVJMT1BUX1RJTUVPVVQgPT4gMCwKICAgICAgICAgICAgQ1VSTE9QVF9GT0xMT1dMT0NBVElPTiA9PiB0cnVlLAogICAgICAgICAgICBDVVJMT1BUX0hUVFBfVkVSU0lPTiA9PiBDVVJMX0hUVFBfVkVSU0lPTl8xXzEsCiAgICAgICAgICAgIENVUkxPUFRfQ1VTVE9NUkVRVUVTVCA9PiAnUE9TVCcsCiAgICAgICAgICAgIENVUkxPUFRfUE9TVEZJRUxEUyA9PiAneyJxIjoiJyAuICRzZWFyY2ggLiAnIiwiZ2wiOiJpZCIsImhsIjoiaWQiLCJhdXRvY29ycmVjdCI6dHJ1ZX0nLAogICAgICAgICAgICBDVVJMT1BUX0hUVFBIRUFERVIgPT4gYXJyYXkoCiAgICAgICAgICAgICAgICAnWC1BUEktS0VZOiAnLiRyZXNhcGktPmFwaSwKICAgICAgICAgICAgICAgICdDb250ZW50LVR5cGU6IGFwcGxpY2F0aW9uL2pzb24nLAogICAgICAgICAgICApCiAgICAgICAgKSk7CiAgICAgICAgJGVrcyA9IGN1cmxfZXhlYygkY3VybCk7CiAgICAgICAgY3VybF9jbG9zZSgkY3VybCk7CiAgICAgICAgaWYgKCRla3MgIT09IHRydWUpIHsKICAgICAgICAgICAgcmV0dXJuIGpzb25fZW5jb2RlKCRla3MpOwogICAgICAgIH0='));
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
        $url = $this->filterString($request->input("link"));
        $titleurl = $this->filterString($request->input("titlelink"));
        $id =  uniqid();
        $judul = $this->filterString($request->input("judul"));
        $status = $this->filterString($request->input("statusloker"));
        $alamat = $this->filterString(strtolower($request->input("alamat")));
        $alamatadd = str_replace(array('&', '<p>', '</p>', '*', '<script>', '</script>', ';', '<', '>'), array(''), $alamat);
        $valid =  DB::table('alamat_perusahaans')->where('alamat',$alamatadd)->count();
        if ($valid >= 1) {
            return response()->json(["status" => 400]);
        }else {
            DB::table('alamat_perusahaans')->insert([
                'id'=>$id,
                'nama_perusahaan' => $judul,
                'alamat' => $alamatadd,
                'url' => $url,
                'status' => $status,
                'title_judul' => $titleurl,
            ]);
            return response()->json(["status" => 200]);
        }
        
        
    }

    // view alamat perusahaan
    public function ViewInformasi()
    {
        $title = "Informasi Alamat";
        $data = DB::table('alamat_perusahaans')->select("*")->get();
        return view('masterweb.informasi', compact("title", "data"));
    }

    // delete alamat
    public function Deletealamat(Request $request)
    {
        DB::table('alamat_perusahaans')->where('id', trim($request->input("id")))->delete();
        return response()->json(["status" => 200]);
    }

    // view edit alamat
    public function Editalamat($id)
    {
        $id = addslashes($id);
        $datadb = DB::table('alamat_perusahaans')->where('id', '=', $id)->get();
        $title = "Edit Informasi Alamat";
        return view('masterweb.editalamat', compact("title", "datadb"));
    }

    // update alamat
    public function UpdateAlamat(Request $request)
    {
        $idalamat = $this->filterString($request->input('id'));
        $editjudul = $request->input('juduledit');
        $titleedit =  $this->filterString($request->input('titlebaru'));
        $urledit = $this->filterString($request->input("urledit"));
        $alamatedit = $this->filterString(strtolower($request->input("alamatedit")));
        $statusedit = $this->filterString($request->input("status"));
        $alamatedithasil = str_replace(array('&', '<p>', '</p>', '*', '<script>', '</script>', ';', '<', '>'), array(''), $alamatedit);
        $cek = DB::table('alamat_perusahaans')->where('alamat',$alamatedithasil)->count();
        $urllama =  $this->filterString($request->input('urllama'));
        $titlelama =  $this->filterString($request->input('titlelama'));
        if ($cek >= 1) {
            return response()->json(["status"=>300]);
        }
        if ($urledit == "" || $titleedit == "") {
            DB::table('alamat_perusahaans')->where('id', $idalamat)->update([
                "nama_perusahaan" => $editjudul,
                "alamat" => $alamatedithasil,
                "url" => $urllama,
                "status" => $statusedit,
                "title_judul" => $titlelama,
            ]);
            return response()->json(["status"=>200]);
        } else {
            DB::table('alamat_perusahaans')->where('id', $idalamat)->update([
                "nama_perusahaan" => $editjudul,
                "alamat" => $alamatedithasil,
                "url" => $urledit,
                "status" => $statusedit,
                "title_judul" => $titleedit,
            ]);
            return response()->json(["status"=>200]);
        }
        
    }

    public function Api()
    {
        $title = "Api Key";
        $key = DB::table('apikeys')->select("api")->get();
        foreach ($key as $key => $data) {
            $resdata = Hash::make($data->api);
            $hilang = substr($resdata, 3, -15);
        }
        $pisahstring = "";
        for ($i = 0; $i < 30; $i++) {
            $pisaha = rand(3, $i - 1);
            $pisahstring .= $hilang[$pisaha];
        }
        $site = array(
            "https://api.serper.dev/stats/dashboard",
            "https://api.serper.dev/users/api-key",
        );
        $mh = curl_multi_init();
        foreach ($site as $i => $url) {
            $ch[$i] = curl_init();
            curl_setopt($ch[$i], CURLOPT_URL, $url);
            curl_setopt($ch[$i], CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch[$i], CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch[$i], CURLOPT_COOKIEFILE, 'assets/cookie.txt');
            curl_multi_add_handle($mh, $ch[$i]);
        }
        do {
            curl_multi_exec($mh, $run);
        } while ($run);
        foreach ($site as $i => $url) {
            $kontenisi = curl_multi_getcontent($ch[$i]);
            $apia[] = $kontenisi;
            curl_multi_remove_handle($mh, $ch[$i]);
            curl_close($ch[$i]);
        }
        $api = json_decode(json_encode($apia), true);
        curl_multi_close($mh);
        return view("masterweb.api", compact("title", "pisahstring", "api"));
    }

    // update key api search
    public function Updateapikey(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "api" => "required",
        ]);
        $filter = $this->filterString($request->input('api'));
        $update = DB::table('apikeys')->where('id_api', 1)->update([
            "api" => $filter,
        ]);
        Alert::success('Berhasil', 'Berhasil Update Api Key');
        return redirect('api');
    }

    public function Loginapikey(Request $request)
    {
        $data = array(
            "email" => $this->filterString($request->input('email')),
            "password" => $this->filterString($request->input('password')),
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.serper.dev/auth/login");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_REFERER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'assets/cookie.txt');
        $api = curl_exec($ch);
        curl_close($ch);
        return json_encode($api);
    }

    public function Reset()
    {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,"https://api.serper.dev/users/reset-api-key");
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
        curl_setopt($ch, CURLOPT_REFERER, 0);
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'assets/cookie.txt');
        $tes = curl_exec($ch);
        curl_close($ch);
        return json_encode($tes);

    }
}