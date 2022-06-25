<?php

namespace App\Http\Controllers\ImportData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imports\FastenImport;
use App\Imports\ObatImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Fasten;
use App\Models\Obat;


class DariExcelController extends Controller
{
    //

    public function index()
    {
        $datas = Fasten::get();
        $data['hitung'] = count($datas); 
        // dd($data['hitung']);
        return view('importData.index');
    }

    public function importFasten()
    {
        Excel::import(new FastenImport,request()->file('file'));
        return back();
    }

    public function importObat()
    {
        Excel::import(new ObatImport,request()->file('file'));
        return back();
    }
    // public function importObt()
    // {
    //     Excel::import(new FastenImport,request()->file('file'));
    //     return back();
    // }



}
