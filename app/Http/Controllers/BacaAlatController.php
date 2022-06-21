<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
