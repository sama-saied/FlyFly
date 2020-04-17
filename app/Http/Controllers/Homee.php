<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\Setting;

use Illuminate\Http\Request;

class Homee extends Controller
{
    public function show()
{
    $first = 'hero_first';
    $fi=setting::get($first);
    
    $second = 'hero_second';
    $se=setting::get($second);
    
    return view('/site.pages.homepage')->with(compact('fi','se'));
}
}
