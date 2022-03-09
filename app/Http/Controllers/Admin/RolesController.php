<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRolesRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $roles = Role::all();
        $header_title = "Roles";
        return view('admin.roles.index', compact('roles','header_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $permissions = Permission::get()->pluck('name', 'name');
        $header_title = "roles.create";
        return view('admin.roles.create', compact('permissions','header_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRolesRequest $request
     * @return array|RedirectResponse
     */
    public function store(StoreRolesRequest $request): array|RedirectResponse
    {
        $role = Role::create($request->except('permissions'));
        $permissions = $request->input('permissions') ? $request->input('permissions') : [];

        if($request->ajax()){
            $permissions = explode(',', $permissions);
            $role->givePermissionTo($permissions);
            // If request from AJAX
            return [
                'success' => true,
                'redirect' => route('roles.index'),
            ];
        } else {
            $role->givePermissionTo($permissions);
            return redirect()->route('roles.index');
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
     * @param Role $role
     * @return Application|Factory|View
     */
    public function edit(Role $role): View|Factory|Application
    {
        $permissions = Permission::get()->pluck('name', 'name');
        $header_title = "roles.edit";
        return view('admin.roles.edit', compact('role', 'permissions','header_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Role $role
     * @return array|RedirectResponse
     */
    public function update(Request $request, Role $role): array|RedirectResponse
    {

        $id =$role->id;
        $validated = $request->validate([
            'name' => "required|unique:roles,name,$id",
        ]);

        $role->update($request->except('permissions'));
        $permissions = $request->input('permissions') ? $request->input('permissions') : [];

        if($request->ajax()){
            $permissions = explode(',', $permissions);
            $role->givePermissionTo($permissions);
            // If request from AJAX
            return [
                'success' => true,
                'redirect' => route('roles.index'),
            ];
        } else {
            $role->givePermissionTo($permissions);
            return redirect()->route('roles.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return RedirectResponse
     */
    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();
        return redirect()->route('roles.index');
    }
}
