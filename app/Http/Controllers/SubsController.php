<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\Mail\Subscribe;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SubsController extends Controller
{
    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:subscriptions'
        ]);
        
        $subscriber = Subscription::add($request->get('email'));
        $subscriber->generateToken();
        
        Mail::to($subscriber)->send(new Subscribe($subscriber));

        return redirect()->back()->with('info', 'Проверьте вашу почту!');
    }

    public function verify($token)
    {
        $subscriber = Subscription::where('token', $token)->firstOrFail();

        $subscriber->token = null;
        $subscriber->save();

        return redirect()->route('main.index')->with('status', 'Спасибо, подписка успешно оформлена');
    }
}
