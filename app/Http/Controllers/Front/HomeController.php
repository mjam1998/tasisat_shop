<?php

namespace App\Http\Controllers\Front;



use App\Enums\BannerType;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\product;
use App\Models\SuperCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
   public function login()
   {
       return view('front.login');
   }
   public function loginSubmit(Request $request)
   {
     $data=$request->validate([
         'mobile' => [
         'required',
         'regex:/^09[0-9]{9}$/',
         'exists:users,mobile'
     ],
         'password' => [
             'required',
             'min:4'
         ]
     ], [
         // پیام‌های خطای mobile
         'mobile.required' => 'شماره موبایل الزامی است.',
         'mobile.regex' => 'فرمت شماره موبایل صحیح نیست. (مثال: 09123456789)',
         'mobile.exists' => 'اطلاعات یافت نشد.',

         // پیام‌های خطای password
         'password.required' => 'رمز عبور الزامی است.',
         'password.min' => 'رمز عبور باید حداقل 4 کاراکتر باشد.'
     ]);
       $user = User::where('mobile', $data['mobile'])->first();

       if (!Hash::check($data['password'], $user->password)) {
           return back()->withErrors([
               'mobile' => 'اطلاعات یافت نشد.'
           ])->withInput();
       }

       auth()->login($user);
       return redirect(route('admin.index'));
   }

    public function search(Request $request)
    {
        $q = $request->search;

        if ($q) {
            $products = Product::where('name', 'like', "%$q%")->paginate(12);
        } else {
            $products = Product::paginate(12);
        }

        return view('front.search', compact('products'));
    }
    public function category($slug){
        $category=Category::query()->where('slug',$slug)->first();
        $products=$category->products()->paginate(12);
        return view('front.category',compact('category','products'));
    }
}
