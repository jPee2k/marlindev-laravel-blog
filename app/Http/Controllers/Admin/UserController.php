<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        return view('admin.user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $data = $request->validated();
 
        $user = new User();
        
        $user->fill($data);
        // $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->hashPassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));
        $user->save();

        $request->session()->flash('success', 'Регистрация пользователя прошла успешно');

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request, User $user)
    {
        $data = $request->validated();

        $user->fill($data);
        $user->hashPassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));
        $user->save();

        $request->session()->flash('success', 'Пользовательские данные успешно обновлены');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->remove();
        $request->session()->flash('success', 'Пользователь успешно удален');
        
        return redirect()->route('users.index');
    }
}
