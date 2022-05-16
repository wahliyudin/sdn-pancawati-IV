<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('pendaftaran');
    }

    public function home()
    {
        return view('user.home');
    }

    public function trimakasih()
    {
        return view('trimakasih');
    }
}
