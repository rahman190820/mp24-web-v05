<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;



class BacaAlatController extends Controller
{
    //

    public function index(Request $request)
    {
        # code...
        // return 'bacaa';
        $datas['ip'] = $request->ip();
        $datas['mac'] = exec('getmac');

         return response()->json($datas, 200);;
    }

    public function kode()
    {
        $fTgl = Carbon::now();
        $date1 = date_create("1990-03-24");
        $date2 = date_create("2022-06-29");
        // $date2 = $fTgl->format('Y-m-d') ;

        $interval = date_diff($date1, $date2);

        $data['selisi'] = $interval->format('%R%y tahun %m bulan');
        $data['kd'] = IdGenerator::generate(['table' => 'users', 'field' => 'nopeserta', 'length' => 10, 'prefix' =>'INV-']);
        
        $data['no'] = $fTgl->format('Ymd');
        return $data;
    }
}
