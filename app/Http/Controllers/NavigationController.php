<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function language($locale)
    {

        App::setLocale($locale);
        $cookie = cookie('lang', $locale, 525600);
        session()->put('locale', $locale);
        return redirect()->back()->cookie($cookie);

    }

    public function dashboard(){
        $header_title = "Dashboard";
        return view('admin.dashboard', compact('header_title'));
    }
}
