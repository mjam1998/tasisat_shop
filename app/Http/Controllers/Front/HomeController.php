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
         $blogs=Blog::query()->take(8)->orderByDesc('created_at')->get();
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
        $sort = $request->get('sort', 'newest');
        $categoryId = $request->get('category');

        $query = Product::query()
            ->leftJoin('sub_products', function($join) {
                $join->on('products.id', '=', 'sub_products.product_id')
                    ->whereNull('sub_products.deleted_at');
            })
            ->select('products.*')
            ->selectRaw('COALESCE(MIN(sub_products.price), products.price) as final_price')
            ->groupBy('products.id');

        if ($q) {
            $query->where('products.name', 'like', "%$q%");
        }
        if ($categoryId) {
            $query->where('products.category_id', $categoryId);
        }
        switch($sort) {
            case 'price_asc':
                $query->orderBy('final_price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('final_price', 'desc');
                break;
            case 'newest':
            default:
                $query->orderBy('products.created_at', 'desc');
                break;
        }

        $products = $query->paginate(12);

        $categories = Category::all();

        return view('front.search', compact('products', 'categories'));
    }


    public function category($slug){
        $category = Category::query()->where('slug', $slug)->first();

        // دریافت پارامتر مرتب‌سازی
        $sort = request('sort', 'newest');
        $search = request('search');
        // شروع query
        $query = $category->products()
            ->leftJoin('sub_products', function($join) {
                $join->on('products.id', '=', 'sub_products.product_id');
            })
            ->select('products.*')
            ->selectRaw('COALESCE(MIN(sub_products.price), products.price) as final_price')
            ->groupBy('products.id');

        if ($search) {
            $query->where('products.name', 'like', "%$search%");
        }

        // اعمال مرتب‌سازی
        switch($sort) {
            case 'price_asc':
                $query->orderBy('final_price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('final_price', 'desc');
                break;
            case 'newest':
            default:
                $query->orderBy('products.created_at', 'desc');
                break;
        }

        $products = $query->paginate(12);

        return view('front.category', compact('category', 'products'));
    }

    public function blogs(){
        $search = request('search');

        // Query اصلی
        $query = Blog::query();

        // اعمال جستجو
        if ($search) {
            $query->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        }

        // دریافت جدیدترین مقاله برای نمایش بزرگ
        $latestBlog = Blog::latest()->first();

        // دریافت 2 مقاله بعدی
        $featuredBlogs = Blog::latest()
            ->skip(1)
            ->take(2)
            ->get();

        // دریافت بقیه مقالات با pagination
        $blogs = $query->latest()
            ->skip(3)
            ->paginate(12);

        return view('front.blogs', compact('latestBlog', 'featuredBlogs', 'blogs'));
    }

    public function blogShow($slug){
        $blog = Blog::query()->where('slug', $slug)->first();
        if (!$blog) {
            abort(404);
        }
        // دریافت مقالات مرتبط (از همان دسته‌بندی یا جدیدترین‌ها)
        $relatedBlogs = Blog::where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();

        return view('front.blog-show', compact('blog', 'relatedBlogs'));
    }

}
