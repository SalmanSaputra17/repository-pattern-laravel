<?php

namespace App\Http\Controllers;

use App\User;
use App\Customer;
use Illuminate\Http\Request;

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
        $users = User::orderBy("created_at", "desc")->paginate(10);
        
        // using lazy loading
        // $customers = Customer::orderBy("created_at", "desc")->paginate(10);
        
        // using eager loading
        $customers = Customer::with('user')->orderBy("created_at", "desc")->paginate(10);
        
        return view('home', [
            "users" => $users,
            "customers" => $customers,
        ]);
    }
}
