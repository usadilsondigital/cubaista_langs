<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\Language;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
           
        $users = User::all();        
        $codes = Language::pluck('code')->toArray();
        return view('userview.index', ['users' => $users,'codes' => $codes]);
    }
}
