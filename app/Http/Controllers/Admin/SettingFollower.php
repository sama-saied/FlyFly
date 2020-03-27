<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class SettingFollower extends Controller
{
    public function follow()
{
    
     //= DB::table('settings')->select('value')->where('id', 11)->get();
     
     $url = DB::table('settings')->select('value')->where('id', 11)->get();

     //('https://www.facebook.com/sama.rocket');
    return redirect()->away($url);
    //return  new RedirectResponse($url); 
}

}
