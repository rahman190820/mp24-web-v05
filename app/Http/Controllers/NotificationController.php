<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\PasienKeDokter;

class NotificationController extends Controller
{
    public function index()
    {
        return view('order');
    }

    public function sendOrderNotification() {
        $user = User::first();

        $orderPasienkeDokter = [
            'name' => $user->name,
            'body' => 'You received an order.',
            'thanks' => 'Thank you',
            'orderText' => 'Check out the order',
            'orderUrl' => url('/'),
            'order_id' => $user->id
        ];

        Notification::send($user, new PasienKeDokter($orderPasienkeDokter));
        dd($user->id);
        // dd('Task completed!');
    }
}
