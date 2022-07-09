<?php

namespace App\Http\Controllers\Pasienp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fasten;
use App\Models\keluhanPasien;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

use App\Http\Requests\ImageUploadRequest;
use App\Models\dokterResep;
use Barryvdh\DomPDF\Facade\Pdf;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


//invoice
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;


class PasienpController extends Controller
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
            $data = keluhanPasien::latest()->get();
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
        keluhanPasien::create([
            'dokter_id'=> 1,
            'pasien_id'=> auth()->user()->id,
            'keluhan'=> $request->txt_nm,
            'tanggal_dibuat'=> Carbon::now(),
            'dokter'=> $request->txt_dkt,
            'status'=>'1' 
        ]);
        $dats = array(
            'dokter_id'=> '',
            'pasien_id'=> '',
            'keluhan'=> $request->txt_nm,
            'tanggal_dibuat'=> date('Y-m-d'),
            'status'=>'1'
        );
        echo json_encode($dats);

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

   
    public function tambahKeluhan(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        $datas['manfaat'] = Fasten::get(['id','fastenmedis']);
        // echo json_encode($datas);
        return view('pasienParent.manfaat',compact('datas'));
    }


    public function tambahDiagnosa(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

        return view('pasienParent.riwayat.diagnosa',compact('datas'));
    }

    public function tambahApotik(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

        return view('pasienParent.riwayat.apotik',compact('datas'));
    }

    public function tambahTagihan(Request $request)
    {
        # code...
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

        return view('pasienParent.riwayat.tagihan',compact('datas'));
    }

    public function dataParent(request $request)
    {
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

        return view('pasienParent.turunan.dataTurunan',compact('datas'));
    }

    public function tambahParent(Request $request)
    {
        // return 'tambah';
        $datas['DataUser'] = User::find(Auth::id());
       
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('pasienParent.turunan.updateC',compact('datas'));
    }



    public function visual(request $request)
    {
        $datas['DataUser'] = User::find(Auth::id());
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

        return view('pasienParent.visual',compact('datas'));
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

    public function uploadResep(Request $request)
    {
        # code...
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      
        $imageName = time().'.'.$request->image->extension();  
       
        $request->image->move(public_path('images'), $imageName);
    
        /* 
            Write Code Here for
            Store $imageName name in DATABASE from HERE 
        */
        keluhanPasien::where('pasien_id',auth()->user()->id)
                        ->update([
                            'foto_resep'=> $imageName,
                            'tgl_keluhan_req_apotik'=> date('Y-m-d H:i:s'),
                        ]);
      
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

    public function simpleQr()
    {
    //    return QrCode::size(200)->generate('A basic example of QR code!');
        $data = "https://www.instagram.com/pln_id/?hl=id";
       $image = QrCode::format('svg')
                        ->size(200)->errorCorrection('H')
                    ->generate($data);
                    $output_file = 'images/qr-code/img-' . time() . '.svg';
Storage::disk('local')->put($output_file, $image);//storage/app/public/img/qr-code/img-1557309130.svg 
        return $image;            
    } 

    public function peta()
    {
        return Fasten::get();
    }

    public function lapPasien(Request $request)
    {
        // $users = User::get();
        $users = DB::table('keluhan_pasiens')
        ->join('users','keluhan_pasiens.pasien_id',  '=','users.id')
        // ->join('dokter_reseps','keluhan_pasiens.id_keluhan',  '=','dokter_reseps.id_resep')
        ->join('fastens','fastens.id','=','keluhan_pasiens.dokter_id')->get();
        
        $data = [
            'title' => 'Laporan Pasien',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
// dd($users);
        $pdf = Pdf::loadView('myPDF', $data);
    return $pdf->stream();
        // return response()->json($id);
    }

    public function billObat(Request $request)
    {
        # code...
        $client = new Party([
            'name'          => 'Roosevelt Lloyd',
            'phone'         => '(520) 318-9486',
            'custom_fields' => [
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $p = User::where('id',12)->first();
        $customer = new Party([
            'name'          => $p->nama,
            'address'       => $p->alamat,
            // 'code'          => '#22663214',
            'custom_fields' => [
                'order number' => '> 654321 <',
            ],
        ]);

        $data_r = dokterResep::where('id_resep',4)->get();
        $items = array();
        foreach($data_r as $item){
            $items[] = (new InvoiceItem())->title($item->nama_obat)->pricePerUnit($item->harga)->quantity($item->jumlah);
        }
        $items[] = (new InvoiceItem())->title('Ongkos kirim obat')->description('Your product or service description')->pricePerUnit(7500);

        $notes = [
            'terima kasih',
            'selamat',
            'Lekas Sembuh',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('receipt')
            ->series('BIG')
            // ability to include translated invoice status
            // in case it was paid
            ->status(__('invoices::invoice.paid'))
            ->sequence(667)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(3))
            ->dateFormat('m/d/Y')
            ->payUntilDays(14)
            ->currencySymbol('Rp. ')
            ->currencyCode('rupiah')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('vendor/invoices/sample-logo.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        // $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }

}
