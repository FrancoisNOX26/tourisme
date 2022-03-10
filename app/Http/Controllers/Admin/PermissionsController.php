<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $permissions = Permission::all();
        $header_title = "Permissions";
        return view('admin.permissions.index', compact('permissions','header_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function store(Request $request)
    {
        Permission::create($request->all());

        if($request->ajax()){
            // If request from AJAX
            return [
                'success' => true,
                'redirect' => route('permissions.index'),
            ];
        } else {
            return redirect()->route('permissions.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Permission $permission
     * @return array|RedirectResponse
     */
    public function update(Request $request, Permission $permission)
    {
        $id = $permission->id;
        $validated = $request->validate([
            'name' => "required|unique:permissions,name,$id",
        ]);

        $permission->update($request->all());

        if($request->ajax()){
            // If request from AJAX
            return [
                'success' => true,
                'redirect' => route('permissions.index'),
            ];
        } else {
            return redirect()->route('permissions.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index');
    }
}
