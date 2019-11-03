<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['destroy']);
    }

    // Restituisce la pagina di login
    public function create()
    {
        return view('sessions.login-page');
    }

    // Esegue il logout
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }

    // Esegue il login
    public function store()
    {
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
          'massage' => 'Check credentials and try again'
        ]);
        }

        //Redirect per login avvenuto con succeso

        return redirect('/annotations');
    }
}
