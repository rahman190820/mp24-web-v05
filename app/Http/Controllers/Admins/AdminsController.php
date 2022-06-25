<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;


class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

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

        return view('admin.index',compact('datas'));
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

    public function adminPage(Request $request)
    {

        $ids = Auth::id();
        $user = User::findOrFail($ids);
        if ($request->ajax()) {

            $data = User::where('type', '!=', 8)
                        ->orwhere('type' ,'!=',9 )
                      
                        ->latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('detail', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit waves-effect waves-light btn-small editProduct">Detail</a>';
                        return $btn;
                    })
                    ->addColumn('status_user',function ($row){
                        $st = $row->stts_approval_user == 'Y' ? 'checked' : '';
                        $btn = '<div class="switch "><label>Tidak Aktif<input id="pil" data-id="'.$row->id.'"   type="checkbox" '.$st.' ><span class="lever"></span>Aktif</label></div>';
                        return $btn;
                    })
                    ->rawColumns(['detail','status_user'])
                    ->make(true);
        }
        $user_id = User::select('nama')->first();
        // return response()->json($user_id);

        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

        return view('admin.validator', compact('datas'));

    }

    public function changeStatus(Request $request)
    {
        $date = Carbon::now();

        $user = User::find($request->user_id);
        $user->stts_approval_user = $request->status;
        $user->date_approval_user = $date;
        $user->save();

        return response()->json(['success'=>'Status User Berhasil .']);
    }

}
