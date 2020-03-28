<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\Setting;

use Illuminate\Support\Facades\URL;

class SettingFollower extends Controller
{
    public function facebook()
{
    $key = 'social_facebook';
$li=setting::get($key);
    
    return redirect()->away($li);    
}

public function twitter()
{
    $key = 'social_twitter';
$li=setting::get($key);
    
    return redirect()->away($li);    
}

public function insta()
{
    $key = 'social_instagram';
$li=setting::get($key);
    
    return redirect()->away($li);    
}

public function linkedin()
{
    $key = 'social_linkedin';
$li=setting::get($key);
    
    return redirect()->away($li);    
}



}
