<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cubaista;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\Language;

class CustomRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mail(string $email)
    {
        
        $codes = Language::pluck('code')->toArray();
        return view('customregisterview.index', ['email' => $email,'codes'=>$codes]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {    
    $request->validate([        
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', Rules\Password::defaults()],
        'password_confirmation' => ['required', Rules\Password::defaults()],
    ]);
    $cuba_aux =  Cubaista::where('email', $request->email)->first();    
    if(is_null( $cuba_aux )){
        return redirect(RouteServiceProvider::WELCOME)->with('error', ' Email NOT registered, change email or Log-in');
    }else{    
      $user = User::firstOrCreate([
        'name' => $cuba_aux->first_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
}
