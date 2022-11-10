<?php

namespace App\Http\Controllers;

use App\Models\Cubaista;
use App\Models\User;
use App\Models\About;
use App\Models\Language;
use App\Http\Requests\StoreCubaistaRequest;
use App\Http\Requests\UpdateCubaistaRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Mail;

class CubaistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       dd(request());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCubaistaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCubaistaRequest $request)
    {
        if ($request->captcha_confirmation === $request->captcha) {
            if ($request->inlineRadioOptions == "option1") {
                $validated = $request->validate([
                    'firstname1' => 'required|max:255',
                    'lastname1' => 'required|max:255',
                    'email1' => 'required|email:rfc,dns|max:255'
                ]);
                $consult  = DB::table('cubaistas')->where('email', $request->email1)->count();
                if ($consult == 0) {
                    $first_name  = $request->firstname1;
                    $last_name  = $request->lastname1;
                    $emailong  = url()->full().'/mail/'.$request->email1;
                    $email  = $request->email1;
                    $additional_notes  = $request->additional_notes1;
                    $cubaista = Cubaista::firstOrNew(['email' =>  $email]);
                    $cubaista->first_name = $first_name;
                    $cubaista->last_name = $last_name;
                    $cubaista->website = '';
                    $cubaista->company_name = '';
                    $cubaista->additional_notes = $additional_notes;
                    $cubaista->save();
                    //enviar el mail
                    Mail::to(request('email1'))
                        ->send(new ConfirmationMail($emailong));
                    //redirect para la pagina de revise su correo
                    return redirect(RouteServiceProvider::WELCOME)->with('success', ' Please check your email for confirmation!');
                } else {
                    return redirect(RouteServiceProvider::WELCOME)->with('error', ' Email already registered, change email or Log-in');
                }
            }
            if ($request->inlineRadioOptions == "option2") {

                $validated = $request->validate([
                    'firstname2' => 'required|max:255',
                    'lastname2' => 'required|max:255',
                    'email2' => 'required|email:rfc,dns|max:255',
                    'based2' => 'required'
                ]);
                if (filter_var($request->website2, FILTER_VALIDATE_URL)) {
                    $consult  = DB::table('cubaistas')->where('email', $request->email2)->count();
                    if ($consult == 0) {
                        $first_name  = $request->firstname2;
                        $last_name  = $request->lastname2;
                        $emailong  = url()->full().'/mail/'.$request->email2;
                        $email  = $request->email2;
                        $website  = $request->website2;
                        $company_name  = $request->company_name2;
                        $additional_notes  = $request->additional_notes2;
                        $cubaista = Cubaista::firstOrNew(['email' =>  $email]);
                        $cubaista->first_name = $first_name;
                        $cubaista->last_name = $last_name;
                        $cubaista->website = $website;
                        $cubaista->company_name = $company_name;
                        $cubaista->additional_notes = $additional_notes;
                        $based2_count =  count($request->based2);
                        $cubaista->save();
                        if ($based2_count > 0) {
                            foreach ($request->based2 as $value) {
                                $aux = new Country;
                                $aux->name = $value;
                                $aux->cubaista_id = $cubaista->id;
                                $aux->save();
                            }
                        }
                        //enviar el mail
                        Mail::to(request('email2'))
                            ->send(new ConfirmationMail($emailong));
                        //redirect para la pagina de revise su correo
                        return redirect(RouteServiceProvider::WELCOME)->with('success', ' Please check your email for confirmation!');
                    } else {
                        return redirect(RouteServiceProvider::WELCOME)->with('error', ' Email already registered, change email or Log-in');
                    }
                } else {
                    return redirect(RouteServiceProvider::WELCOME)->with('error', ' Website invalid ');
                }
            }
            if ($request->inlineRadioOptions == "option3") {
                $validated = $request->validate([
                    'firstname3' => 'required|max:255',
                    'lastname3' => 'required|max:255',
                    'email3' => 'required|email:rfc,dns|max:255'
                ]);
                if (filter_var($request->website3, FILTER_VALIDATE_URL)) {
                    $consult  = DB::table('cubaistas')->where('email', $request->email3)->count();
                    if ($consult == 0) {
                        $first_name  = $request->firstname3;
                        $last_name  = $request->lastname3;
                        $email  = url()->full().'/mail/'.$request->email3;
                        $email  = $request->email3;
                        $website  = $request->website3;
                        $company_name  = $request->company_name3;
                        $additional_notes  = $request->additional_notes3;
                        $cubaista = Cubaista::firstOrNew(['email' =>  $email]);
                        $cubaista->first_name = $first_name;
                        $cubaista->last_name = $last_name;
                        $cubaista->website = $website;
                        $cubaista->company_name = $company_name;
                        $cubaista->additional_notes = $additional_notes;
                        $cubaista->save();
                        $based3_count =  count($request->based3);
                        if ($based3_count > 0) {
                            foreach ($request->based3 as $value) {
                                $aux = new Country;
                                $aux->name = $value;
                                $aux->cubaista_id = $cubaista->id;
                                $aux->save();
                            }
                        }
                        //enviar el mail
                        Mail::to(request('email3'))
                            ->send(new ConfirmationMail($emailong));
                        //redirect para la pagina de revise su correo
                        return redirect(RouteServiceProvider::WELCOME)->with('success', ' Please check your email for confirmation!');
                    } else {
                        return redirect(RouteServiceProvider::WELCOME)->with('error', ' Email already registered, change email or Log-in');
                    }
                } else {
                    return redirect(RouteServiceProvider::WELCOME)->with('error', ' Website invalid ');
                }
            }
            if ($request->inlineRadioOptions == "option4") {
                $validated = $request->validate([
                    'firstname4' => 'required|max:255',
                    'lastname4' => 'required|max:255',
                    'email4' => 'required|email:rfc,dns|max:255'
                ]);
                if (filter_var($request->website4, FILTER_VALIDATE_URL)) {
                    $consult  = DB::table('cubaistas')->where('email', $request->email4)->count();
                    if ($consult == 0) {
                        $first_name  = $request->firstname4;
                        $last_name  = $request->lastname4;
                        $emailong  = url()->full().'/mail/'.$request->email4;
                        $email  = $request->email4;
                        $website  = $request->website4;
                        $company_name  = $request->company_name4;
                        $additional_notes  = $request->additional_notes4;
                        $cubaista = Cubaista::firstOrNew(['email' =>  $email]);
                        $cubaista->first_name = $first_name;
                        $cubaista->last_name = $last_name;
                        $cubaista->website = $website;
                        $cubaista->company_name = $company_name;
                        $cubaista->additional_notes = $additional_notes;
                        $cubaista->save();
                        $based4_count =  count($request->based4);
                        if ($based4_count > 0) {
                            foreach ($request->based4 as $value) {
                                $aux = new Country;
                                $aux->name = $value;
                                $aux->cubaista_id = $cubaista->id;
                                $aux->save();
                            }
                        }
                        //enviar el mail
                        Mail::to(request('email4'))
                            ->send(new ConfirmationMail($emailong));
                        //redirect para la pagina de revise su correo
                        return redirect(RouteServiceProvider::WELCOME)->with('success', ' Please check your email for confirmation!');
                    } else {
                        return redirect(RouteServiceProvider::WELCOME)->with('error', ' Email already registered, change email or Log-in');
                    }
                } else {
                    return redirect(RouteServiceProvider::WELCOME)->with('error', ' Website invalid ');
                }
            }
        } else {
            return redirect(RouteServiceProvider::WELCOME)->with('error', ' Captcha  invalid ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cubaista  $cubaista
     * @return \Illuminate\Http\Response
     */
    public function show(Cubaista $cubaista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cubaista  $cubaista
     * @return \Illuminate\Http\Response
     */
    public function edit(Cubaista $cubaista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCubaistaRequest  $request
     * @param  \App\Models\Cubaista  $cubaista
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCubaistaRequest $request, Cubaista $cubaista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cubaista  $cubaista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cubaista $cubaista)
    {
        //
    }
}
