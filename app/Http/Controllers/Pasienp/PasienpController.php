<?php

namespace App\Http\Controllers\Pasienp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Manfaat;
use App\Models\keluhanPasien;
use Illuminate\Support\Facades\Auth;

// use Carbon\Carbon;



class PasienpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pasienParent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        User::where('id',$id)->update([
            'noPeserta' => $request->noPeserta,
            'noKartu' => $request->noKartu,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kodepos' => $request->kodepos,
            'email' => $request->email,
            'noHP' => $request->noHP,
            'tglLahir' => $request->tglLahir,
        ]);

     return back()->with('sukses',);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function daftarpas()
    {
        # code...
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('pasienParent.daftar',compact('datas'));
    }

    public function actRegister(Request $request)
    {
        # code...
    }

    public function tambahParent(Request $request)
    {
        // return 'tambah';
        $datas['DataUser'] = User::find(Auth::id());
       
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('pasienParent.updateC',compact('datas'));
    }


    public function tambahManfaat(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        $datas['manfaat'] = Manfaat::get();
        return view('pasienParent.manfaat',compact('datas'));
    }


    public function tambahDiagnosa(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

        return view('pasienParent.diagnosa',compact('datas'));
    }

    public function tambahApotik(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

        return view('pasienParent.apotik',compact('datas'));
    }

    public function tambahTagihan(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

        return view('pasienParent.tagihan',compact('datas'));
    }

    public function dataParent(request $request)
    {
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

        return view('pasienParent.dataTurunan',compact('datas'));
    }

    public function visual(request $request)
    {
        // $datas['DataUser'] = User::find(Auth::id());
        // $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        // $datas['notifications'] = auth()->user()->unreadNotifications;

        return view('pasienParent.visual');
    }

    public function buat_keluhan(Request $request)
    {
       $datas = User::find($request);
       return view('pasienParent.keluhan',compact('datas')); 
    }

    public function reqKeluhan(Request $request)
    {
        keluhanPasien::create([
            'dokter_id'=> $request->dokter_id,
            'pasien_id'=> $request->pasien_id,
            'keluhan'=> $request->keluhan,
            'tanggal_dibuat'=> date('Y-m-d H:i:s'),
        ]);

        return redirect('keluhan');
        
    }


}
