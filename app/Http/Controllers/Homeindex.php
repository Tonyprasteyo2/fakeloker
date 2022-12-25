<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Homeindex extends Controller
{

    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip();
    }

    //view index
    public function index(Request $request)
    {
        $title = "Kebenaran";
        if ($request->routeIs('index') || $request->routeIs('/')) {
            $cek = DB::table('visitors')->where('ip',$this->getIp())->count();
            $tambah = DB::table('visitors')->select("*")->get();
            foreach($tambah as $es);
            if ($cek == 0 ) {
                DB::table('visitors')->insert([
                    "ip" => $this->getIp(),
                    "tanggal" => date('Y-m-d'),
                    "browser" => $_SERVER['HTTP_USER_AGENT'],
                    "jumlah" => 1,
                    "bulan"=>date('m'),
                ]);
            }else {
                DB::table('visitors')->where('ip',$this->getIp())->update([
                    "jumlah"=>$es->jumlah+1,
                ]);
            }
            return view("index",compact("title"));
        }
    }
    public function Cek(Request $request)
    {
        $valid = Validator::make($request->all(),[
            "carialamat"=>"required",
        ]);
        $kebenaran = new Kebenaran();
        $alamat = $request->input('alamat');
        $filter = $kebenaran->filterString($alamat);
        $filterxss = str_replace(array('&', '<', '>'), array('&amp;', '&lt;', '&gt;'), $filter);
        if ($alamat =='') {
            return response()->json(["status"=>300]);
        }else {
            $cek = DB::table('alamat_perusahaans')->where('alamat','like',"%$filterxss%")->get();
            return response()->json($cek);
        }
    }
}
