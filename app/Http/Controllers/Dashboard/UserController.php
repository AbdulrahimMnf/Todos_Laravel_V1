<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::latest()->paginate(10),
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
                'name' => 'required',
            ]
        );
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'about' => $request->about,
            // 'image'=> $request->image,
        ]);
        $user->syncRoles($request->roles);
        return redirect('dashboard/users');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view(
            'Dashboard.users.edit',
            [
                'user' => $user,
                'roles' => Role::all(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
                'name' => 'required',
            ]
        );
        $user->fill(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'about' => $request->about,
                // 'image'=> $request->image,
            ]
        )->update();
        $user->save();
        $user->syncRoles($request->roles);
        return redirect('dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('dashboard/users');
    }
}
