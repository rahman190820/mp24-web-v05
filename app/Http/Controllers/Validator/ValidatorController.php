<?php

namespace App\Http\Controllers\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use DataTables;

use App\Models\LogDB; //logSystem
use Auth;

use Notification; //notif
use App\Notifications\PasienKeDokter;

class ValidatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('detail', function($row){
                            // $btn = '<button class="waves-effect waves-light btn-small" >test</button>';
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit waves-effect waves-light btn-small editProduct">Detail</a>';
   
    
                            return $btn;
                    })
                    ->addColumn('status_user',function ($row){
                        if ($row->stts_approval_user == 'Y') {
                            return '<span class=" badge blue">aktif</span>';
                        } else {
                            return '<span class=" badge red">non-aktif</span>';
                        }
                        
                    })
                    ->rawColumns(['detail','status_user'])
                    ->make(true);
        }
        // echo json_encode($request->ajax());
        // dd($datas);
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
      
        echo json_encode($datas);
// return view('view.name', compact('data'));
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

}