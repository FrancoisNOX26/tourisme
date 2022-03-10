<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSitesRequest;
use App\Models\Site;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $items = Site::all();
        $header_title= "Sites";
        return view('admin.sites.index', compact('items','header_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $header_title= "site.create";
        return view('admin.sites.create', compact('header_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(storeSitesRequest $request)
    {
        $site = Site::create($request->all());
        if($request->ajax()){
            // If request from AJAX
            return [
                'success' => true,
                'redirect' => route('sites.index'),
            ];
        } else {
            return redirect()->route('sites.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Site $site
     * @return Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Site $site
     * @return Application|Factory|View
     */
    public function edit(Site $site)
    {
        $header_title= "sites.edit";

        return view('admin.sites.edit', compact('site','header_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Site $site
     * @return RedirectResponse
     */
    public function update(Request $request, Site $site)
    {

        $validated = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:50',
        ]);

        $site->update($request->all());

        if($request->ajax()){
            // If request from AJAX
            return [
                'success' => true,
                'redirect' => route('sites.index'),
            ];
        } else {

            return redirect()->route('sites.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Site $site
     * @return Response
     */
    public function destroy(Site $site)
    {
        $site->delete();
        return back()->withSuccess(trans('app.success_destroy'));
    }
}
