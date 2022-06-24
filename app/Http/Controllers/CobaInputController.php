<?php

namespace App\Http\Controllers;

use App\Models\CobaInput;
use Illuminate\Http\Request;

use Elibyy\TCPDF\Facades\TCPDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Fasten;


class CobaInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $collection = CobaInput::all();
        // return response()->json($collection);
        return view('coba.index',compact('collection'));
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
     * @param  \App\Models\CobaInput  $cobaInput
     * @return \Illuminate\Http\Response
     */
    public function show(CobaInput $cobaInput)
    {
        //
        $category = CobaInput::find($cobaInput);

	    return response()->json([
	      'data' => $category
	    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CobaInput  $cobaInput
     * @return \Illuminate\Http\Response
     */
    public function edit(CobaInput $cobaInput)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CobaInput  $cobaInput
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CobaInput $cobaInput)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CobaInput  $cobaInput
     * @return \Illuminate\Http\Response
     */
    public function destroy(CobaInput $cobaInput)
    {
        //
    }

    public function cetak_pdf()
    {
        $pdf = new TCPDF;
        $pdf::SetTitle('Hello World');
        $pdf::AddPage();
        $pdf::Write(0, 'Hello World');
        $pdf::Output('hello_world.pdf');
    }

    public function render_pdf()
    {
        $filename = 'hello_world.pdf';

    	$data = [
    		'judul' => 'Hello world!',
            // 'qrcode' => QrCode::size(300)->generate('A basic example of QR code!'),
            'qrcode'=> QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'),
    	];

        // $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));


    	// $view = \View::make('coba.cetak_pdf', $data);
        // $html = $view->render();

    	$pdf = new TCPDF;
        
        $pdf::SetTitle('Hello World');
        $pdf::AddPage();
        // $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::Output(public_path($filename), 'F');

        return response()->download(public_path($filename));
    }

    public function simpleQr()
    {
       return QrCode::size(300)->generate('A basic example of QR code!');
    } 

    public function ttd()
    {
        return view('coba.signaturePad');
    }
    
    
    public function upload(Request $request)
    {
        $folderPath = public_path('gambar_ttd/');
        
        $image_parts = explode(";base64,", $request->signed);
              
        $image_type_aux = explode("image/", $image_parts[0]);
           
        $image_type = $image_type_aux[1];
           
        $image_base64 = base64_decode($image_parts[1]);
           
        $file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
        return back()->with('success', 'success Full upload signature');
    }

    public function pdf_dom()
    {
        $pdf = new Pdf;
        // $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    //     $pdf = PDF::loadView('pdf.invoice', $data);
    // return $pdf->download('invoice.pdf');
    }

    public function kueri()
    {
        // $data['kueri-semua'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%')->get();
        $data['result-Regional-total'] = Fasten::where('fastenmedis','like','MP%UID%')->count();
        $data['result-Regional-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%UID%')->get();
        
        $data['result-unit-bisnis-strategis-total'] = Fasten::where('fastenmedis','like','MP%SBU%')->count();
        $data['result-unit-bisnis-strategis-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%SBU%')->get();
        

        $data['result-daerah-unit-sby-total'] = Fasten::where('fastenmedis','like','MP%SBY%')->count();
        $data['result-daerah-unit-sby-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%SBY%')->get();
       
        $data['result-daerah-unit-sda-total'] = Fasten::where('fastenmedis','like','MP%SDA%')->count();
        $data['result-daerah-unit-sda-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%SDA%')->get();

        $data['result-daerah-logistik-bgr-total'] = Fasten::where('fastenmedis','like','MP%BGR%')->count();
        $data['result-daerah-logistik-bgr-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%BGR%')->get();
       
        $data['result-daerah-penunjang-pasar-modal-psr-total'] = Fasten::where('fastenmedis','like','MP%PSR%')->count();
        $data['result-daerah-penunjang-pasar-modal-psr-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%PSR%')->get();
       
        $data['result-daerah-unit-stb-total'] = Fasten::where('fastenmedis','like','MP%STB%')->count();
        $data['result-daerah-unit-stb-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%STB%')->get();
       
        $data['result-daerah-Steel-non-magnetic-bwg-total'] = Fasten::where('fastenmedis','like','MP%BWG%')->count();
        $data['result-daerah-Steel-non-magnetic-bwg-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%BWG%')->get();
       
        $data['result-daerah-jawa-barat-jbr-total'] = Fasten::where('fastenmedis','like','MP%JBR%')->count();
        $data['result-daerah-jawa-barat-jbr-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%JBR%')->get();
       
        $data['result-daerah-unit-malang-total'] = Fasten::where('fastenmedis','like','MP%MLG%')->count();
        $data['result-daerah-unit-malang-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%MLG%')->get();
        
        $data['result-daerah-unit-kediri-total'] = Fasten::where('fastenmedis','like','MP%KDR%')->count();
        $data['result-daerah-unit-kediri-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%KDR%')->get();
       
        $data['result-daerah-unit-madiun-total'] = Fasten::where('fastenmedis','like','MP%MDN%')->count();
        $data['result-daerah-unit-madiun-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%MDN%')->get();
       
        $data['result-daerah-unit-mojokerto-total'] = Fasten::where('fastenmedis','like','MP%MJK%')->count();
        $data['result-daerah-unit-mojokerto-data'] = Fasten::select('id','fastenmedis','koordinat_lat','koordinat_long')->where('fastenmedis','like','MP%MJK%')->get();
       
        
        
        
        return response()->json($data);
    }
}
