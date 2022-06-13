<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PasienController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        // $data = $request->session()->all();
        $data = auth()->user();
        echo json_encode($data);
    }
}
