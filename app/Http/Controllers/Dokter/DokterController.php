<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\dokterResep;
use App\Models\keluhanPasien;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = dokterResep::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('dokter.index');
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

        // dokterResep::create([

        // ]);
        $datas = array(


        );
        echo json_encode($datas);
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
    public function update(Request $request)
    {
        //
        //  json_encode($request);
        keluhanPasien::where('id_keluhan', $request->idx)
                        ->update([
                            'diagnosa'=> $request->diagnosa,
                            'tgl_keluhan_respon_dokter'=> Carbon::now(),
                            'status'=>'2'
                        ]);
        
        // foreach ($request->addmore as $key => $value) {
        //     dokterResep::create($value);
        // }

        return back()->with('success', 'OK');
    }

    public function addMorePost(Request $request)
    {
        # code...
        foreach ($request->addmore as $key => $value) {
            dokterResep::create($value);
        }
        return back()->with('success', 'Record Created Successfully.');
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

    public function daftarPas(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('dokter.dafpas',compact('datas'));
    }

    public function daftar_diag(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('dokter.dafdiag',compact('datas'));
    }

    public function daftar_obt(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('dokter.dafobt',compact('datas'));
    }

    public function lap_diok(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('dokter.dafdiok');
    }

}
