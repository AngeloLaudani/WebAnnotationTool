<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    // Restituisce la pagina di registrazione
    public function create()
    {
        return view('registration.signup-page');
    }

    // Registra il nuovo utente
    public function store()
    {
        $this->validate(request(), [
      'name' => 'required',
      'email' => 'required|unique:users|email',
      'password' => 'required|confirmed'
    ]);

        $user = User::create([
      'name' => request('name'),
      'email' => request('email'),
      'password' => Hash::make(request('password'))
    ]);

        //Signin User
        auth()->login($user);

        //Mail Benvenuto
        Mail::to($user)->send(new WelcomeMail($user));

        //Redirect
        return redirect('/annotations');
    }
}
