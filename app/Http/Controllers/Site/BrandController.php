<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\BrandContract;

class BrandController extends Controller
{
    protected $BrandRepository;

    public function __construct(BrandContract $BrandRepository)
    {
        $this->BrandRepository = $BrandRepository;
    }

    public function show($slug)
    {
        $brand  = $this->BrandRepository->findBySlug($slug);
       // $brand = $this->BrandRepository->findBrandById($id);
     //   dd($category);
        return view('site.pages.brand', compact('brand'));
    }
    
   
}