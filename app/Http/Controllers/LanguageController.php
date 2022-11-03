<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Providers\RouteServiceProvider;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes = Language::pluck('code')->toArray();
        return view('languageview.index', ['codes' => $codes]);
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
     * @param  \App\Http\Requests\StoreLanguageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguageRequest $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:4',
            'english_name' => 'required|string|max:255',
            'directionality' => 'required|string|max:255',
            //'local_name' => 'string|max:255',
            //'url_wiki' => 'url',
        ]);
        $consult  = \DB::table('languages')->where('code', strtolower($request->code))->count();
        if ($consult == 0) {
            $language = Language::firstOrNew(
                ['code' => strtolower($request->code), 'english_name' => $request->english_name, 'directionality' => $request->directionality],
                ['local_name' => $request->local_name, 'url_wiki' => $request->url_wiki]
            );
            $language->save();
            return redirect(route('language.index'))->with('success', ' New language created!');
        } else {
            return redirect(RouteServiceProvider::LANGUAGE)->with('error', ' Code already registered, change code');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLanguageRequest  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        //
    }
}
