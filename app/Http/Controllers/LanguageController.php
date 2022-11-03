<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('languageview.index');
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
        /*$locales = \Config::get('app.locales');        
        array_push($locales,$request->code);
        
        \Config::set('app.locales', $locales);
        //salvalo en el fichero
        $path_to_file = 'path/to/the/file';
        $file_contents = file_get_contents($path_to_file);
        $file_contents = str_replace("\nH", ",H", $file_contents);
        file_put_contents($path_to_file, $file_contents);


        dd(\Config::get('app.locales'));   

      /*  $validated = $request->validate([
            'code' => 'required|string|max:255',
            'english_name' => 'required|string|max:255',
            'directionality' => 'required|string|max:255',
            //'local_name' => 'string|max:255',
            //'url_wiki' => 'url',
        ]);

        $language = Language::firstOrNew(
            ['code' => $request->code, 'english_name' => $request->english_name,'directionality' => $request->directionality],
            ['local_name' =>$request->local_name,'url_wiki' =>$request->url_wiki]
        );
        $language->save();*/

        //leer la lista de lenguages
        //ponerlo en el listado de lenguages
 
        return redirect(route('language.index'))->with('success', ' New language created!');
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
