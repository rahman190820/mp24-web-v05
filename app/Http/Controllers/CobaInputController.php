<?php

namespace App\Http\Controllers;

use App\Models\CobaInput;
use Illuminate\Http\Request;

use Elibyy\TCPDF\Facades\TCPDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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


    	$view = \View::make('coba.cetak_pdf', $data);
        $html = $view->render();

    	$pdf = new TCPDF;
        
        $pdf::SetTitle('Hello World');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');

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

}
