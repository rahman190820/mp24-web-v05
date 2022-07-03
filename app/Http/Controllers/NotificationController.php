<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\PasienKeDokter;

use Notification;


use App\Models\LogDB;
// use Auth;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    public function index()
    {
        return view('order');
    }

    public function sendOrderNotification() {
        $user = User::first();

        $orderPasienkeDokter = [
            'name' => $user->nama,
            'body' => 'You received an order.',
            'thanks' => 'Thank you',
            'orderText' => 'Check out the order',
            'orderUrl' => url('/'),
            'user_id' => $user->id,
            'email' => $user->email,
        ];

        Notification::send($user, new PasienKeDokter($orderPasienkeDokter));
        LogDB::record(auth()->user()->id, 'Akses notif pasein ke dokter', 'oleh Sistem');
        // dd(Auth::user());
        dd($user->id);
        // dd('Task completed!');
    }

    public function notifcaca()
    {
        # code...
        $datas['notif_count'] = count(auth()->user()->unreadNotifications);
        $datas['notifications'] = auth()->user()->unreadNotifications;
        echo json_encode($datas);   
    }

}
