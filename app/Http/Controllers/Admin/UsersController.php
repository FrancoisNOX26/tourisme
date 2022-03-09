<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUsersRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $items = User::all();
        $header_title= "users";
        return view('admin.users.index', compact('items','header_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $header_title= "users.create";
        $roles = Role::get()->pluck('name', 'name');
        return view('admin.users.create', compact('roles','header_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUsersRequest $request
     * @return RedirectResponse
     */
    public function store(CreateUsersRequest $request)
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }

        $user = User::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        if($request->ajax()){
            $roles = explode(',', $roles);
            $user->syncRoles($roles);
            // If request from AJAX
            return [
                'success' => true,
                'redirect' => route('users.index'),
            ];
        } else {
            $user->assignRole($roles);
            return redirect()->route('users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $header_title= "users.edit";
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.edit', compact('user', 'roles','header_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  User  $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user)
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }

        $id =$user->id;
        $validated = $request->validate([
            'name' => 'required|min:2',
            'email'    => "required|email|unique:users,email,$id",
            'password' => 'nullable|confirmed',
        ]);
        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        if($request->ajax()){

            $roles = explode(',', $roles);
            $user->syncRoles($roles);
            // If request from AJAX
            return [
                'success' => true,
                'redirect' => route('users.index'),
            ];
        } else {
            $user->syncRoles($roles);
            return redirect()->route('users.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return Response
     */
    public function destroy(User $user)
    {
//        if (! Gate::allows('users_manage')) {
//            return abort(401);
//        }

        $user->delete();
        return back()->withSuccess(trans('app.success_destroy'));
    }
}
