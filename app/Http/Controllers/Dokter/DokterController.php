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

//invoice
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

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
                            'tgl_keluhan_res_dokter'=> Carbon::now(),
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

    public function cetakInvoice()
    {
        // $customer = new Buyer([
        //     'name'          => 'John Doe',
        //     'custom_fields' => [
        //         'email' => 'test@example.com',
        //     ],
        // ]);

        // $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(50000);

        // $invoice = Invoice::make()
        //     ->buyer($customer)
        //     ->discountByPercent(10)
        //     ->taxRate(15)
        //     ->shipping(1.99)
        //     ->addItem($item);
        // // dd($invoice);
        // return $invoice->stream();

        
        // $customer = Invoice::makeParty([
        //     'name' => 'Dokter John Doe',
        // ]);

        // $item = Invoice::makeItem('Diagnosa Keluhan')->pricePerUnit(120000);

        // return Invoice::make()->buyer($customer)->addItem($item)->stream();

        $client = new Party([
            'name'          => 'Roosevelt Lloyd',
            'phone'         => '(520) 318-9486',
            'custom_fields' => [
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $customer = new Party([
            'name'          => 'Ashley Medina',
            'address'       => 'The Green Street 12',
            'code'          => '#22663214',
            'custom_fields' => [
                'order number' => '> 654321 <',
            ],
        ]);

        $items = [
            (new InvoiceItem())
                ->title('Layanan Dokter')
                ->description('Your product or service description')
                ->pricePerUnit(45,779)
                
                ->discount(10),
            (new InvoiceItem())->title('Ongkos kirim obat')->pricePerUnit(7.196),
            (new InvoiceItem())->title('Obat')->pricePerUnit(456),
            (new InvoiceItem())->title('Service 4')->pricePerUnit(8.751)->quantity(7)->discount(4)->units('kg'),
            (new InvoiceItem())->title('Service 5')->pricePerUnit(709)->quantity(7)->discountByPercent(9),
            (new InvoiceItem())->title('Service 6')->pricePerUnit(7.632)->quantity(9),
            (new InvoiceItem())->title('Service 7')->pricePerUnit(5.818)->quantity(3)->discount(3),
            (new InvoiceItem())->title('Service 8')->pricePerUnit(4.299)->quantity(4)->discountByPercent(3),
            (new InvoiceItem())->title('Service 9')->pricePerUnit(3.324)->quantity(6)->units('m2'),
            (new InvoiceItem())->title('Service 11')->pricePerUnit(9.745)->quantity(2),
            (new InvoiceItem())->title('Service 12')->pricePerUnit(9.282),
            (new InvoiceItem())->title('Service 13')->pricePerUnit(1.298),
            (new InvoiceItem())->title('Service 14')->pricePerUnit(160)->units('hours'),
            (new InvoiceItem())->title('Service 15')->pricePerUnit(6.221)->discountByPercent(5),
            (new InvoiceItem())->title('Service 16')->pricePerUnit(280),
            (new InvoiceItem())->title('Service 17')->pricePerUnit(5621),
            (new InvoiceItem())->title('Service 18')->pricePerUnit(6.681)->discountByPercent(8),
            (new InvoiceItem())->title('Service 19')->pricePerUnit(7.637),
            (new InvoiceItem())->title('Service 20')->pricePerUnit(5.580),
        ];

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

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }

}
