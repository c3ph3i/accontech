<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Place;

class DashboardController extends Controller
{
    /**
     * Show homepage
     *
     * @return view
    */
    public function getHomePage(){
        $user_list = Place::where('user_id', Auth::user()['id'])
            ->get()->toArray();
        return view('dashboard.home')->with('list', $user_list);
    }
}
