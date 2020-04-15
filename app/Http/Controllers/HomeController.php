<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function tr()
    {
        App::setLocale("tr");
        session()->put('locale', 'tr');
        return redirect()->back();
    }

    public function en()
    {
        App::setLocale("en");
        dd(App::getLocale());
        session()->put('locale', 'en');
        return redirect()->back();
    }
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
        return view('home');
    }
}
