<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (request()->ajax()){
            return auth()->user()->unreadNotifications;
        }
        return view('admin.notificaciones.index', [
            'unreadNotifications' => auth()->user()->unreadNotifications,
            'readNotifications' => auth()->user()->readNotifications,
        ]);
    }

    public function read($id){
        DatabaseNotification::find($id)->markAsRead();

        if (request()->ajax()){
            return auth()->user()->unreadNotifications;
        }

        return back()->with('info', 'Notificación marcada como leída');
    }

    public function readAll()
    {
        $user = \App\User::find(auth()->user()->id);

        $user->unreadNotifications()->update(['read_at' => now()]);

        if (request()->ajax()){
            return auth()->user()->unreadNotifications;
        }


        return back()->with('info', 'Notificaciones marcadas como leída');
    }
}
