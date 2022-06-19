<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;// kueri kostom db 
use App\Models\User;//panggil model user

use App\Notifications\PasienKeDokter;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return 'index';
    }

    public function pasienParentHome()
    {
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('konten.isi',compact('datas'));
    }

    public function pasienChildHome()
    {
        return view('konten.isi');
    }

    public function dokterHome()
    {
        // return view('konten.isi');
        return view('dokter.index');
    }

    public function apotikHome()
    {
        return view('konten.isi');
    }

    public function labHome()
    {
        # code...
        return view('konten.isi');
    }

    public function adminHome()
    {
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('konten.isi',compact('datas'));
    }

    public function supportHome()
    {
        return view('konten.isi');
    }

    public function manejHome()
    {
        return view('konten.isi');
    }

    public function validatorHome()
    {
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
      
        return view('konten.isi',compact('datas'));
    }

    public function administratorHome()
    {
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
      
        return view('administrator.index',compact('datas'));
    }

    public function klinikHome()
    {
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
      
        return view('klinik.index',compact('datas'));
    }

    public function baca()
    {
        // $datas['nama'] = array(
        //     'name' => 'Abigail',
        //     'state' => 'CA',
        // );

        $cari = '1';
        $datas['chart'] = User::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw("Month(created_at)"))
        ->groupBy(DB::raw("EXTRACT(MONTH FROM created_at )"))
        ->pluck('count');

        $datas['hitung_user'] = DB::table('users')->count();
        $datas['id_max_user'] = DB::table('users')->max('id');
        $datas['id_min_user'] = DB::table('users')->min('id');
        // $datas['cari'] = DB::table('users')->where('type','like',"%".$cari."%");// mengambil data dari table pegawai sesuai pencarian data
        $datas['order'] =  DB::table('users')
        ->orderBy('name', 'desc')
        ->get();
        $datas['order_lav']= DB::table('users')
        ->latest()
        ->first();
        $datas['data'] = DB::table('users')->select('name', 'email as user_email')->get();
        $datas['dis'] = DB::table('users')->distinct()->get();

      
        // $users = DB::select('select * from users');
        // foreach ($users as $user) {
        //     echo $user->name;
        // }

        // act
        // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Marc']);
        // $affected = DB::update(
        //     'update users set votes = 100 where name = ?',
        //     ['Anita']
        // );
        // $deleted = DB::delete('delete from users');
        // DB::statement('drop table users');


$invoice = 'test';

            // dd($datas);
        // return response()->json($datas);
        Auth::User()->id->notify(new PasienKeDokter($invoice));


        return view('tampil', compact('datas'));
        // return 'baca';
    }

    public function lihat()
    {
        # code...
        // Auth::logout();
        return view('konten.isi');
    }

}
