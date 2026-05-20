<?php

namespace App\Http\Controllers\Front;



use App\Enums\BannerType;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\SuperCategory;

class HomeController extends Controller
{
    public function index()
    {
        $sliders=Banner::query()->where('type',BannerType::Slider)->get();
         $superCategories=SuperCategory::all();
         $discountBanner=Banner::query()->where('type',BannerType::DiscountBanner)->first();
         $blogs=Blog::query()->take(8)->get();
         $banner1=Banner::query()->where('type',BannerType::BannerOne)->first();
         $banner2=Banner::query()->where('type',BannerType::BannerTwo)->first();
         $banner3=Banner::query()->where('type',BannerType::BannerThree)->first();
         $banner4=Banner::query()->where('type',BannerType::BannerFour)->first();
       return view('front.index',['sliders'=>$sliders,
           'superCategories'=>$superCategories,
           'discountBanner'=>$discountBanner
       ,'blogs'=>$blogs,
           'banner1'=>$banner1,
           'banner2'=>$banner2,
           'banner3'=>$banner3,
           'banner4'=>$banner4,]);
   }
}
