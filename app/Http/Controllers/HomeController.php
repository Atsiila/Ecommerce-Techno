<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategori;
use Auth;
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
        $user = Auth::user();
        if ($user->isAdmin == 1) {
            return view('admin.index');
        } else {
            return view('index');
        }
        $users = User::all();
        $totalUsers = $users->count();
        
        $kategori = Kategori::all();
        $total = $kategori->count();
        
        return view('home', compact('totalUsers', 'total'));
        

    }
}
