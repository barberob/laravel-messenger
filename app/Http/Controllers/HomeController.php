<?php

namespace App\Http\Controllers;

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
        $users = User::all('id', 'name');
        return view('home')->with('users', $users);
    }

    public function conversation($id)
    {
        $auth_id = Auth::id();
        return view('conversation')->with('receiver_id', $id);
    }

    public function postAddMessage($receiver_id, Request $request)
    {
        dd($request, $receiver_id);
    }
}
