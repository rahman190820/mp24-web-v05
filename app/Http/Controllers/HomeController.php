<?php

namespace App\Http\Controllers;

use App\Models\Fasten;
use App\Models\keluhanPasien;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;// kueri kostom db 
use App\Models\User;//panggil model user

use App\Notifications\PasienKeDokter;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


use Haruncpi\LaravelIdGenerator\IdGenerator;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('auth_fasten');
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

    public function pasienParentHome(Request $request)
    {
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;

        if ($request->ajax()) {
            $data = DB::table('keluhan_pasiens')
                    ->join('users','keluhan_pasiens.pasien_id',  '=','users.id')
                    ->join('fastens','fastens.id','=','keluhan_pasiens.dokter_id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('aksi', function ($baris){
                        $btn = '<a href="#m_storeresep" data-toggle="tooltip"  data-id="'.$baris->id_keluhan.'" data-original-title="Edit" class="btn waves-effect waves-light cyan modal-trigger tampil">upload resep</a>&nbsp';
                        $btn  = $btn. '<a href="'.route('lap.pasien').'" target="_blank" data-toggle="tooltip"  data-id="'.$baris->id_keluhan.'" data-original-title="Edit" class="edit btn btn-primary btn-sm ">Laporan</a>&nbsp';
                        $btn  = $btn. '<a href="'.route('billing').'" target="_blank" data-toggle="tooltip"  data-id="'.$baris->id_keluhan.'" data-original-title="Edit" class="edit btn btn-primary btn-sm ">Billing</a>';

                        return $btn;
                    })
                  
                    ->rawColumns(['aksi'])
                    ->make(true);
        }

        $datas['fasten'] = Fasten::all();
        return view('pasienParent.index',compact('datas'));
    }

    public function pasienParentHomeUser(Request $request)
    {
        # code...
        if ($request->ajax()) {
            $data = User::where('child', auth()->user()->id)->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('aksi', function ($baris){
                        $btn = '<a href="#m_diagnosa" data-toggle="tooltip"  data-id="'.$baris->id.'" data-original-title="Edit" class="btn waves-effect waves-light cyan modal-trigger">Detail</a>';
                        return $btn;
                    })
                    ->rawColumns(['aksi'])
                    ->make(true);
        }
        return view('paseinParent.index');
    }

    public function pasienChildHome()
    {
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        return view('konten.isi',compact('datas'));
    }

    public function dokterHome(Request $request)
    {
        // return view('konten.isi');
        $datas['notif_count'] = count(auth('fastens')->user()->unreadNotifications);
        $datas['notifications'] = auth('fastens')->user()->unreadNotifications;

        if ($request->ajax()) {
            $data = DB::table('keluhan_pasiens')
            ->join('users','keluhan_pasiens.pasien_id',  '=','users.id')
            ->join('fastens','fastens.id','=','keluhan_pasiens.dokter_id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('aksi', function ($baris){
                        $btn = '<a href="#m_diagnosa"  data-toggle="tooltip" data-id="'.$baris->id_keluhan.'" data-nopeserta="'.$baris->nopeserta.'"  data-nama="'.$baris->nama.'" data-keluhan="'.$baris->keluhan.'" data-original-title="Edit" class="btn waves-effect waves-light cyan modal-trigger tampil">Detail</a>';
                        return $btn;
                    })
                    ->rawColumns(['aksi'])
                    ->make(true);     
        }

        $datas['DataUser'] = Fasten::find(auth('fastens')->user()->id);
        $datas['kdResep'] = IdGenerator::generate(['table' => 'keluhan_pasiens', 'field' => 'foto_resep', 'length' => 8, 'prefix' =>'RSP-']);;
        
      
        return view('dokter.index',compact('datas'));
    }

    public function apotikHome(Request $request)
    {
        $datas['notif_count'] = count(auth('fastens')->user()->unreadNotifications);
        $datas['notifications'] = auth('fastens')->user()->unreadNotifications;
      
        if ($request->ajax()) {
            // $data = keluhanPasien::latest()->get();
            $data = DB::table('keluhan_pasiens')
            ->join('users','keluhan_pasiens.pasien_id',  '=','users.id')
            ->join('fastens','fastens.id','=','keluhan_pasiens.dokter_id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('aksi', function ($baris){
                        $btn = '<a href="#m_diagnosa"  data-toggle="tooltip" data-id="'.$baris->id_keluhan.'" data-nopeserta="'.$baris->nopeserta.'"  data-nama="'.$baris->nama.'" data-keluhan="'.$baris->keluhan.'" data-gambar="'.$baris->foto_resep.'" data-original-title="Edit" class=" btn waves-effect waves-light cyan modal-trigger tampil">Detail</a>';
                        return $btn;
                    })
                    ->rawColumns(['aksi'])
                    ->make(true);     
        }
        
        return view('apotik.index',compact('datas'));
    }

    public function labHome()
    {
        $datas['notif_count'] = count(auth('fastens')->user()->unreadNotifications);
        $datas['notifications'] = auth('fastens')->user()->unreadNotifications;
      
        return view('konten.isi',compact('datas'));
    }

    public function adminHome()
    {
        $datas['notif_count'] = count(auth('fastens')->user()->unreadNotifications);
        $datas['notifications'] = auth('fastens')->user()->unreadNotifications;
        return view('konten.isi',compact('datas'));
    }

    public function supportHome()
    {
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
      
        return view('konten.isi',compact('datas'));
    }

    public function manejHome()
    {
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
      
        return view('konten.isi',compact('datas'));
    }

    public function validatorHome()
    {
        // $users = auth('fastens')->user();
        // dd($users);
        $datas['notif_count'] = count(auth('fastens')->user()->unreadNotifications);
        $datas['notifications'] = auth('fastens')->user()->unreadNotifications;
        //   return 'tes';
        return view('validator.index',compact('datas'));
        // return view('konten.isi',compact('datas'));
    }

    public function administratorHome()
    {
        $datas['notif_count'] = count(auth('fastens')->user()->unreadNotifications);
        $datas['notifications'] = auth('fastens')->user()->unreadNotifications;

        $datas['hitung_user_pasien'] = count(User::where('type',0 )->orwhere('type',3)->get());
        $datas['hitung_user_admin'] = count(User::where('type',0 )->orwhere('type',3)->get());
        $datas['hitung_user_amistrator'] = count(User::where('type',0 )->orwhere('type',3)->get());
        $datas['hitung_user_fasten'] = count(User::where('type',0 )->orwhere('type',3)->get());
        $datas['hitung_user_apotik'] = count(User::where('type',0 )->orwhere('type',3)->get());

        // dd($datas);
      
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

    public function tentangkami()
    {
        # code...
        return "tentang kami";
    }

    public function fasilitasMedis()
    {
        # code...
        return "fasilitas medis";
    }

    public function beritaMedis()
    {
        # code...
        return "berita medis";
    }

    public function kontakKami()
    {
        return "kontak kami";
    }

}
