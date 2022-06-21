<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use 
use Notification; //notif

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas['DataUser'] = User::find(Auth::id());
        // dd($DataUser);

        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

        return view('person.index',compact('datas'));
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

        $datas = User::where('id',$id)->update(  [
                        'noPeserta' => $request->noPeserta,
            'noKartu' => $request->noKartu,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kodepos' => $request->kodepos,
            'email' => $request->email,
            'noHP'=> str_replace('-','',$request->noHP),
            'tanggalLahir' => $request->tanggalLahir,
     ] );

    //  return $request;
     return redirect('person');

    //  $datas['DataUser'] = User::find(auth()->user()->id);
     // dd($DataUser);

    //  $datas['notif_count'] = count(auth()->user()->unreadNotifications);
    //  $datas['notifications'] = auth()->user()->unreadNotifications;

    //  echo json_encode($datas);

    //   return Redirect::route('profil');
    // return redirect()->route('person');


    //   return redirect()->action('${App\Http\Controllers\PersonController@index}');
    //  redirect('index');
    //  return view('person.index',compact('datas'));
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
}
