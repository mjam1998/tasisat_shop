<?php

namespace App\Http\Controllers\Front;



use App\Enums\BannerType;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\SuperCategory;

class HomeController extends Controller
{
    public function index()
    {
        $sliders=Banner::query()->where('type',BannerType::Slider)->get();
         $superCategories=SuperCategory::all();
       return view('front.index',['sliders'=>$sliders,'superCategories'=>$superCategories]);
   }
}
