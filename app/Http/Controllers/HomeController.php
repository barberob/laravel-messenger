<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
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
        $users = User::all('id', 'name')->whereNotIn('id', Auth::id());
        return view('pages.home')->with('users', $users);
    }

    public function conversation($receiver_id)
    {
        $receiver = User::findOrFail($receiver_id);
        $sender_id = Auth::id();

        $messages = Message::all()
            ->whereIn('receiver_id', [$receiver->id, $sender_id])
            ->whereIn('sender_id', [$receiver->id, $sender_id]);

        return view('pages.conversation', [
            'receiver' => $receiver,
            'sender_id' => $sender_id,
            'messages' => $messages
        ]);
    }

    public function postAddMessage($receiver_id, Request $request)
    {
        $receiver_id = intval($receiver_id);
        $sender_id = Auth::id();

        Message::create([
            'receiver_id' => $receiver_id,
            'sender_id' => $sender_id,
            'content' => $request->input('content')
        ]);

        return redirect()->route('conversation', ['receiver_id' => $receiver_id]);
    }
}
