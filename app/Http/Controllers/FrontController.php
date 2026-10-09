<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class FrontController extends Controller
{
    public function home(): View
    {
        return view('index');
    }

    public function about(): View
    {
        return view('about');
    }

    public function service(): View
    {
        return view('service');
    }

    public function industry(): View
    {
        return view('industry');
    }

    public function subscription(): View
    {
        return view('subscription');
    }

    public function contact(): View
    {
        return view('contact');
    }

    public function terms(): View
    {
        return view('terms-condition');
    }
}
