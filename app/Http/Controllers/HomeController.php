<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('index');
    }
    public function home()
    {
        return view('index');
    }
    public function laravel()
    {
        return view('laravel');
    }
}