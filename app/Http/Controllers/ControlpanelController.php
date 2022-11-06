<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\About;
use App\Models\Language;
use App\Models\User;

class ControlpanelController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        $languages = Language::all();      
        $users = User::all();        
        $codes = Language::pluck('code')->toArray();
        return view('controlview.index', ['users' => $users,'languages' => $languages,'abouts' => $abouts,'codes' => $codes]);
    }
}
