<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Language;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    //public function setTranslation(string $attributeName, string $locale, string $value)
    //Important consideration
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        $codes = Language::pluck('code')->toArray();
        return view('aboutview.index', ['abouts' => $abouts,'codes' => $codes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codes = Language::pluck('code')->toArray();
        return view('aboutview.create', ['codes' => $codes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutRequest $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        $consult  = DB::table('abouts')->where('title', $request->title)->count();
        if ($consult == 0) {
            $about = About::firstOrNew(
                ['title' =>$request->title, 'body' => $request->body]
            );
            $about->save();

            return redirect(route('about.index'))->with(__('messages.success'), ' New About created!');
        } else {
            return redirect(RouteServiceProvider::LANGUAGE)->with( __('messages.error'), __('messages.about_already_registered'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutRequest  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function translate($id)
    {
     
        $about  = About::where('id',$id)->first();
        $codes = Language::pluck('code')->toArray();
        return view('aboutview.translate', ['codes' => $codes,'about'=>$about,'id'=>$id]); 
    }

     /**
     * Store a newly created resource in storage.
     * 
     * @param  \App\Http\Requests\StoreAboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function translatestore(StoreAboutRequest $request)
    {
        $id = $request->id;
        $title = $request->title;
        $body = $request->body;
        $selected_lang = $request->selected_lang;        
        $affec2 = DB::table('abouts')->where('id', $id)->update(['title->'.$selected_lang =>$title,'body->'.$selected_lang =>$body ]);        
        if ($affec2 == 1) {
            return redirect(route('about.index'))->with(__('messages.success'), ' Updated Successful');
        } else {
            return redirect(RouteServiceProvider::LANGUAGE)->with( __('messages.error'), __('messages.not_updated'));
        }
    }

    public function tra(About $about)
    {
        //UPDATE `abouts` SET `title` = '{\n \"en\": \"hello\",\n \"es\": \"holi\"\n}' WHERE `abouts`.`id` = 4;
        $users = DB::table('users')->whereJsonContains('options->languages', 'en')->get();
        $users = DB::table('users')->whereJsonContains('options->languages', ['en', 'de'])->get();
        $affec = DB::table('users')->where('id', 1)->update(['options->enabled' => true]);

        /*$first = About::find($id)->first();
dd($first->where('title->es', 'hola2')->first());
$affec = DB::table('abouts')->where('id',$id)->where('title->es', 'hola2')->get();
dd($affec);
//  ->where('title', '=', 100)
//->where('age', '>', 35)*/
$affec2 = DB::table('abouts')->where('id', 3)->update(['title->en' => 'HAa']);
dd($affec2);
        /**INSERT INTO
  `abouts` (`title`, `updated_at`, `created_at`)
VALUES
  (
    { "en": "hello",
    "es": "hola" },
    2022 -11 -06 20: 18: 28,
    2022 -11 -06 20: 18: 28
  ) */
        $translations = ['en' => 'hello', 'es' => 'hola'];
      //  $about->setTranslations('title',"en", 'Nuevo VAlor');
        $about->setTranslations('title',$translations);
        $about->setTranslations('body',$translations);
        $about->save();
        return redirect(route('about.index'))->with(__('messages.success'), ' translated');
    }


}
