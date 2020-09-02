<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        return view('page.user.register', compact('user'));
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
        $user->hashPassword($request->get('password'));
        $user->save();

        $request->session()->flash('success', 'Регистрация прошла успешно. Пожалуйста, авторизируйтесь на сайте');

        return redirect()->route('user.login-page');
    }

    public function loginForm()
    {
        return view('page.user.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => [
                'required',
                'email'
            ],
            'password' => 'required'
        ]);

        $auth = Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        if ($auth) {
            return redirect()->route('main.index');
        }

        return redirect()->back()->with('alert', 'Неправильный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();

        return view('page.user.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $userID = Auth::user()->id;
        $user = User::findOrFail($userID);

        $data = $this->validate($request, [
            'name' => 'required|min:3|max:255|alpha',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userID)
            ],
            'password' => [
                'min:6',
                'max:255',
                'confirmed',
                'nullable',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/'
            ],
            'avatar' => 'nullable|image|max:256'
        ]);

        $user->fill($data);
        $user->hashPassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));
        $user->save();

        return redirect()->back()->with('status', 'Профиль успешно обновлен');
    }
}
