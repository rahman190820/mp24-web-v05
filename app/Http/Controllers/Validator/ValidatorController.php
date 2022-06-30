<?php

namespace App\Http\Controllers\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
// use DataTables;
use Yajra\DataTables\Facades\DataTables;

use App\Models\LogDB; //logSystem
// use Auth;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DataTables;

use Notification; //notif
use App\Notifications\PasienKeDokter;

use Carbon\Carbon;


class ValidatorController extends Controller
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
            $data = LogDB::latest()->get();
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

        return view('validator.index');
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
    public function show(Request $request)
    {
        //
        // $data = User::find('id', $request->id)->first();
        $data = User::find($request->id);
        return response()->json($data);
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

    public function validatorPage(Request $request )
    {
        // LogDB::record(Auth::user(), 'Akses Halaman Pengguna Baru', 'oleh rule validator'); //logs system
        $ids = Auth::id();
        $user = User::findOrFail($ids);

        $orderPasienkeDokter = [
            'name' => $user->nama,
            'body' => 'You received an order.',
            'thanks' => 'Thank you',
            'orderText' => 'Check out the order',
            'orderUrl' => url('/'),
            'order_id' => $user->id,
            'email' => $user->email,
        ];

        // Notification::send($user, new PasienKeDokter($orderPasienkeDokter)); //komunikasi request


        if ($request->ajax()) {
            $data = User::where('type', '=', 0)->orwhere('type' ,'=',3 )->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('detail', function($row){
                            // $btn = '<button class="waves-effect waves-light btn-small" >test</button>';
                           $btn = '<a href="#m_diagnosa"   data-id="'.$row->id.'" data-nama="'.$row->nama.'" data-original-title="Edit" class="btn waves-effect waves-light cyan modal-trigger tampil">Detail</a>';
                            return $btn;
                    })
                    ->addColumn('status_user',function ($row){
                        $st = $row->stts_approval_user == 'Y' ? 'checked' : '';
                        // $btn =  '<input data-id="'.$row->id.'" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" >';
                        $btn = '<div class="switch "><label>Tidak Aktif<input id="pil" data-id="'.$row->id.'"   type="checkbox" '.$st.' ><span class="lever"></span>Aktif</label></div>';
                      
                        return $btn;
                    })
                    ->addColumn('stts_approval',function ($row){
                        $st = $row->stts_approval == 'Y' ? 'checked' : '';
                        // $btn =  '<input data-id="'.$row->id.'" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" >';
                        $btn = '<div class="switch "><label>Tidak Aktif<input id="pil_app" data-id="'.$row->id.'"   type="checkbox" '.$st.' ><span class="lever"></span>Aktif</label></div>';
                      
                        return $btn;
                    })
                    ->rawColumns(['detail','status_user','stts_approval'])
                    ->make(true);
        }
        // echo json_encode($request->ajax());
        // dd($datas);
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
      
        // echo json_encode($datas);
return view('validator.pengguna', compact('datas'));
        // return view('validator.pengguna');
    }

    function invoiceNumber()
    {
        /*
            fungsi create kode
            */
            $kode = null;
            $latest = User::latest()->first();

            if (! $latest) {
                $kode = 'arm0001';
            }
        
            $string = preg_replace("/[^0-9\.]/", '', $latest->noKartu);
        
            $kode = 'NOKRT' .str_pad((int)$string+1, 5, '0', STR_PAD_LEFT);


    }

    public function changeStatus(Request $request)
    {
        $date = Carbon::now();

        $user = User::find($request->user_id);
        $user->stts_approval_user_by = auth()->user()->nama;
        $user->stts_approval_user = $request->status;
        $user->date_approval_user = $date;
        $user->save();

        return response()->json(['success'=>'Status User Berhasil .']);
    }

    public function changeStatusProfil(Request $request)
    {
        $date = Carbon::now();

        $user = User::find($request->user_id);
        $user->stts_approval_user_by = auth()->user()->nama;
        $user->stts_approval = $request->status;
        $user->date_approval = $date;
        $user->save();

        return response()->json(['success'=>'Status User Berhasil .']);
    }

}
