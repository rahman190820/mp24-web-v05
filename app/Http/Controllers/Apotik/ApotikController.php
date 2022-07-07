<?php

namespace App\Http\Controllers\Apotik;

use App\Http\Controllers\Controller;
use App\Models\dokterResep;
use App\Models\keluhanPasien;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Yajra\DataTables\Facades\DataTables;

use Carbon\Carbon;

class ApotikController extends Controller
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
            $data = User::latest()->get();
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
        return view('apotik.index');
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

    public function resRsp(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('apotik.rsp',compact('datas'));
    }


    public function krm(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('apotik.krm',compact('datas'));
    }

    public function lap(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('apotik.lap',compact('datas'));
    }


    public function getObt(Request $request)
    {
        # code...
        $data = keluhanPasien::where('id_keluhan',$request->id);
        // if ($request->ajax()) {
        //     # code...
        //     $data = dokterResep::get();
        //     // $data = dokterResep::where('id_keluhan',$request->id)->get();
        //     return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('aksi', function ($baris){
        //             $btn = '<a href="#m_diagnosa"  data-toggle="tooltip" data-id="'.$baris->id.'"  data-original-title="Edit" class=" btn waves-effect waves-light cyan modal-trigger tampil">Detail</a>';
        //             return $btn;
        //         })
        //         ->rawColumns(['aksi'])
        //         ->make(true);                   
        // }

        return response()->json($data);

    }


    public function tambahObat(Request $request)
    {

        keluhanPasien::where('id_keluhan',$request->idx)->update([
            'tgl_keluhan_res_apotik'=>Carbon::now(),
        ]);
        foreach ($request->addmore as $key => $value) {
            dokterResep::create($value);
        }
        return back()->with('success', 'Record Created Successfully.');
    }


}
