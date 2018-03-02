<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\TogoList;

class DashboardController extends Controller
{
    /**
     * Show homepage
     *
     * @return view
    */

    public function getHomePage(){
        $user_list = TogoList::where('user_id', Auth::user()['id'])
            ->get()->toArray();
        return view('dashboard.home')->with('list', $user_list);
    }
}
