<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    /**
     * @param $locale
     * @return RedirectResponse
     */
    public function language($locale): RedirectResponse
    {
        App::setLocale($locale);
        $cookie = cookie('lang', $locale, 525600);
        session()->put('locale', $locale);
        return redirect()->back()->cookie($cookie);
    }

    /**
     * @return Application|Factory|View
     */
    public function dashboard(): View|Factory|Application
    {
        $header_title = "Dashboard";
        return view('admin.dashboard', compact('header_title'));
    }

    /**
     * @return Application|Factory|View
     */

    public function index(): View|Factory|Application
    {
        $sites = Site::all()->take(4);
        return view('front.index', compact('sites'));
    }

    /**
     * @return Factory|View|Application
     */

    public function allsites(): Factory|View|Application
    {
        $sites = Site::all();
        return view('front.sites', compact('sites'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function showsite($id): View|Factory|Application
    {
        $site = Site::findOrFail($id);
        return view('front.site', compact('site'));
    }
}
