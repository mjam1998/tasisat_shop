<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>فروشگاه اقای صفر تا صد</title>




    <link rel="stylesheet" href="{{asset('front/assets/js/plugin/story-player/styles.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/js/plugin/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/app.css')}}">
</head>
<body class="bg-[#fcfdfe] dark:bg-[#050505] min-h-screen transition-colors duration-700 selection:bg-blue-500/30 selection:text-blue-600 ">
<!-- NEON LIGHT -->
<div class="fixed  inset-0 pointer-events-none -z-[60] overflow-hidden bg-[#fafbfc] dark:bg-[#030303]">
    <div class="absolute -top-[15%] -left-[10%] w-[70%] h-[70%] bg-indigo-500/10 dark:bg-indigo-600/[0.15] blur-[150px] rounded-full animate-pulse" style="animation-duration: 8s;"></div>
    <div class="absolute -bottom-[15%] -right-[10%] w-[70%] h-[70%] bg-blue-500/10 dark:bg-blue-600/[0.18] blur-[150px] rounded-full animate-pulse" style="animation-duration: 10s;"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[50%] h-[50%] bg-blue-400/[0.03] dark:bg-blue-500/[0.05] blur-[120px] rounded-full"></div>
    <div class="absolute inset-0 opacity-[0.03] dark:opacity-[0.06] pointer-events-none mix-blend-multiply dark:mix-blend-soft-light" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=\'0 0 200 200\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'n\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'0.8\' numOctaves=\'4\' stitchTiles=\'stitch\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23n)\'/%3E%3C/svg%3E');"></div>
</div>
<!-- END NEON LIGHT -->
<!-- HEADER -->
<header class="glass-header sticky top-0 z-50 border-b drop-shadow border-gray-200/50 dark:border-gray-800/50 bg-white/80 dark:bg-gray-950/80 backdrop-blur-xl transition-all duration-300">

    <div class="container">
        <div class="flex items-center justify-between h-20 gap-8">
            <div class="flex items-center gap-4">
                <button id="resMenu" class="lg:hidden p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-colors">
                    <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                </button>
                <button id="mobile-search-toggle" class="md:hidden p-2.5 rounded-xl border border-gray-200/50 dark:border-white/10 bg-white/40 dark:bg-white/5 text-gray-600 dark:text-gray-400 transition-all shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
                <a href="index.html" class="flex items-center gap-2 group">
                    <img src="../front/assets/images/logo.png" class="w-30" alt="">
                </a>
            </div>
            <!-- Search -->
            <div id="search-wrapper" class="hidden md:flex flex-1 max-w-4xl relative group/search mx-auto" style="z-index: 100000; position: relative;">

                <div class="relative w-full z-[10000]">
                    <input type="text" id="main-search-input" class="w-full bg-gray-200/60 dark:bg-[var(--color-primary-950)]/60 backdrop-blur-md border border-gray-300/30 dark:border-white/5 rounded-2xl py-4 pr-12 pl-40 text-sm font-bold text-right outline-none focus:bg-white dark:focus:bg-[var(--color-primary-950)] focus:ring-4 ring-[var(--color-primary-500)]/40 transition-all placeholder:text-gray-500 shadow-sm" placeholder="جستجوی سراسری در محصولات ...">

                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2.5"></path></svg>
                    </div>

                    <div class="absolute left-2 top-1/2 -translate-y-1/2 flex items-center h-[75%] gap-2">
                        <div class="h-full w-px bg-gray-300/40 dark:bg-white/10 ml-1"></div>
                        <button class="h-full px-4 flex items-center gap-3 rounded-xl transition-all duration-300 group/archive
                                   bg-white border border-gray-200 text-gray-700 shadow-sm hover:border-[var(--color-primary-500)]
                                   dark:bg-[var(--color-primary-800)]/60 dark:border-white/10 dark:text-gray-200 dark:hover:bg-[var(--color-primary-500)]/10">
                            <div class="flex items-center justify-center w-6 h-6 rounded-lg bg-gray-100 dark:bg-white/10 group-hover/archive:bg-[var(--color-primary-500)] group-hover/archive:text-white transition-all duration-300">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </div>
                            <span class="text-[11px] font-black whitespace-nowrap">آرشیو محصولات</span>
                        </button>
                    </div>
                </div>


            </div>
            <!-- Register and action button-->
            <div class="flex items-center gap-3">
                <button id="dark-mode-toggle" class="p-2.5 rounded-xl border border-gray-200/50 dark:border-white/10 bg-white/40 dark:bg-white/5 backdrop-blur-md hover:border-primary-500/50 hover:bg-white/80 dark:hover:bg-white/10 text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-all duration-300 shadow-sm">
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 9H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"/>
                    </svg>
                    <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </button>
                <div class="relative group">
                    <button id="login-btn" class="flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200/50 dark:border-white/10 bg-white/40 dark:bg-white/5 backdrop-blur-md hover:border-primary-500/50 hover:bg-primary-50/50 dark:hover:bg-primary-500/10 transition-all duration-300 group shadow-sm">
                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:text-primary-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span class="text-xs font-black text-gray-700 dark:text-gray-200 hidden lg:block uppercase tracking-tighter">ورود یا ثبت‌نام</span>
                    </button>
                </div>
                <button id="cart-btn" class="relative p-2.5 rounded-xl border border-secondary-500/20 bg-secondary-500/10 dark:bg-secondary-500/20 backdrop-blur-md hover:bg-secondary-500 hover:text-white transition-all duration-300 group shadow-lg shadow-secondary-500/10">
                    <svg class="w-6 h-6 text-secondary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    <span class="absolute -top-1.5 -right-1.5 bg-primary-600 text-white text-[10px] font-black w-5 h-5 flex items-center justify-center rounded-lg border-2 border-white dark:border-gray-950 shadow-sm">2
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="hidden lg:block bg-white/50 dark:bg-gray-950/50 border-t border-gray-100 dark:border-gray-800">
        <div class="container mx-auto px-8">
            <ul class="flex items-center gap-8 py-3">
                <li class="group/main static">
                    <a href="#" class="flex items-center gap-2 py-4 text-[13px] font-bold text-gray-800 dark:text-gray-200 group-hover/main:text-[var(--color-primary-500)] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                      دسته بندی ها

                    </a>
                    <div class="absolute top-full right-0 left-0 w-full bg-white dark:bg-[var(--color-primary-950)] border-t border-gray-100 dark:border-[var(--color-primary-900)] shadow-2xl opacity-0 invisible group-hover/main:opacity-100 group-hover/main:visible transition-all duration-200 z-50 flex h-[580px]">
                        <div class="container mx-auto flex h-full">
                            <div class="w-64 border-l border-gray-100 dark:border-[var(--color-primary-900)] py-2 overflow-y-auto bg-gray-50/80 dark:bg-[var(--color-primary-900)]/30">
                                <ul class="flex flex-col">
                                    <!--Digital goods-->
                                    <li class="mega-tab-item active group/tab" data-target="dk-digital">
                                        <a href="#" class="flex items-center gap-3 px-6 py-4 text-[13px] font-bold text-gray-600 dark:text-gray-400 group-[.active]/tab:bg-white dark:group-[.active]/tab:bg-[var(--color-primary-950)] group-[.active]/tab:text-[var(--color-primary-600)] dark:group-[.active]/tab:text-[var(--color-primary-400)] transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                            کالای دیجیتال

                                        </a>
                                    </li>
                                    <!--Home and kitchen-->

                                </ul>
                            </div>
                            <div class="flex-1 p-8 overflow-y-auto custom-scrollbar bg-white dark:bg-[var(--color-primary-950)]">
                                <!--Digital goods-->
                                <div id="dk-digital" class="mega-tab-content">
                                    <div class="flex items-center justify-between mb-8">
                                        <a href="#" class="flex items-center gap-1 text-[14px] font-black text-gray-900 dark:text-white hover:text-[var(--color-primary-500)]">
                                            مشاهده تمام محصولات کالای دیجیتال

                                            <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 5l7 7-7 7" stroke-width="3"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="grid grid-cols-4 gap-x-6 gap-y-10">
                                        <div class="space-y-4">
                                            <a href="#" class="flex items-center gap-2 text-[14px] font-black text-gray-900 dark:text-white border-r-2 border-[var(--color-primary-500)] pr-3">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                </svg>
                                                موبایل

                                            </a>
                                            <ul class="space-y-3 pr-4 text-[12.5px] text-gray-500 dark:text-gray-400">
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)] transition-colors">گوشی‌های هوشمند</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)] transition-colors">برند اپل (iPhone)</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)] transition-colors">برند سامسونگ</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)] transition-colors">برند شیائومی</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)] transition-colors">گوشی‌های میان‌رده</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)] transition-colors">گوشی‌های اقتصادی</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)] transition-colors">گوشی‌های گیمینگ</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="space-y-4">
                                            <a href="#" class="flex items-center gap-2 text-[14px] font-black text-gray-900 dark:text-white border-r-2 border-[var(--color-primary-500)] pr-3">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                                لپ‌تاپ

                                            </a>
                                            <ul class="space-y-3 pr-4 text-[12.5px] text-gray-500 dark:text-gray-400">
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">لپ‌تاپ‌های گیمینگ</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">مک‌بوک‌های اپل</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">لپ‌تاپ‌های تجاری</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">لپ‌تاپ‌های دانشجویی</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">لپ‌تاپ‌های فوق سبک</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="space-y-4">
                                            <a href="#" class="flex items-center gap-2 text-[14px] font-black text-gray-900 dark:text-white border-r-2 border-[var(--color-primary-500)] pr-3">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                                </svg>
                                                هدفون و ساعت

                                            </a>
                                            <ul class="space-y-3 pr-4 text-[12.5px] text-gray-500 dark:text-gray-400">
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">هندزفری بی‌سیم</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">ساعت‌های هوشمند</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">هدفون‌های گیمینگ</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">اسپیکر و سیستم صوتی</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">مچ‌بند سلامت</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">هدفون‌های نویزکنسلینگ</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="space-y-4">
                                            <a href="#" class="flex items-center gap-2 text-[14px] font-black text-gray-900 dark:text-white border-r-2 border-[var(--color-primary-500)] pr-3">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                                </svg>
                                                لوازم جانبی

                                            </a>
                                            <ul class="space-y-3 pr-4 text-[12.5px] text-gray-500 dark:text-gray-400">
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">کابل و شارژر</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">پاوربانک (شارژر همراه)</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">کیف و کاور</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">پایه موبایل و لپ‌تاپ</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">محافظ صفحه نمایش</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="space-y-4">
                                            <a href="#" class="flex items-center gap-2 text-[14px] font-black text-gray-900 dark:text-white border-r-2 border-[var(--color-primary-500)] pr-3">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                                </svg>
                                                ذخیره‌سازی

                                            </a>
                                            <ul class="space-y-3 pr-4 text-[12.5px] text-gray-500 dark:text-gray-400">
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">هارد اکسترنال</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">فلش مموری</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">کارت حافظه</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">هارد SSD</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">درایوهای NAS</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="space-y-4">
                                            <a href="#" class="flex items-center gap-2 text-[14px] font-black text-gray-900 dark:text-white border-r-2 border-[var(--color-primary-500)] pr-3">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                دوربین

                                            </a>
                                            <ul class="space-y-3 pr-4 text-[12.5px] text-gray-500 dark:text-gray-400">
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">دوربین عکاسی</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">لنز و لوازم حرفه‌ای</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">دوربین فیلمبرداری</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">دوربین‌های اکشن</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">دوربین‌های مداربسته</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="space-y-4">
                                            <a href="#" class="flex items-center gap-2 text-[14px] font-black text-gray-900 dark:text-white border-r-2 border-[var(--color-primary-500)] pr-3">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                                </svg>
                                                کامپیوتر و قطعات

                                            </a>
                                            <ul class="space-y-3 pr-4 text-[12.5px] text-gray-500 dark:text-gray-400">
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">کارت گرافیک</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">پردازنده (CPU)</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">مادربورد</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">رم (RAM)</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">مانیتور و نمایشگر</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">کیبورد و موس</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="space-y-4">
                                            <a href="#" class="flex items-center gap-2 text-[14px] font-black text-gray-900 dark:text-white border-r-2 border-[var(--color-primary-500)] pr-3">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                </svg>
                                                گیمینگ

                                            </a>
                                            <ul class="space-y-3 pr-4 text-[12.5px] text-gray-500 dark:text-gray-400">
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">کنسول بازی</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">دسته بازی</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">صندلی گیمینگ</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">میز گیمینگ</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hover:text-[var(--color-primary-500)]">کارت گرافیک گیمینگ</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>

                <li class="relative group/drop">
                    <button class="flex items-center gap-1 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors py-4 w-full lg:w-auto">
                        منوی آبشاری

                        <svg class="w-4 h-4 transition-transform group-hover/drop:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <ul class="lg:absolute lg:top-full lg:right-0 w-full lg:w-64 bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 shadow-xl lg:rounded-2xl py-2 opacity-0 invisible group-hover/drop:opacity-100 group-hover/drop:visible lg:transform lg:translate-y-2 lg:group-hover/drop:translate-y-0 transition-all duration-300 z-50 hidden lg:block mobile-menu-content">
                        <li class="relative p-2 group/subdrop">
                            <a href="#" class="flex rounded items-center justify-between px-4 py-3 text-xs text-gray-600 dark:text-gray-300 hover:bg-primary-50 dark:hover:bg-primary-900/20 hover:text-primary-600 transition-colors">
                                        <span class="flex items-center gap-3">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" stroke-width="2"/>
                                            </svg>
                                            واحد پشتیبانی

                                        </span>
                                <svg class="w-3 h-3 lg:block hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                                </svg>
                            </a>
                            <ul class="lg:absolute lg:right-full lg:top-0 w-full lg:w-56 bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 shadow-xl lg:rounded-2xl py-2 opacity-0 invisible group-hover/subdrop:opacity-100 group-hover/subdrop:visible lg:transform lg:translate-x-2 lg:group-hover/subdrop:translate-x-0 transition-all duration-300 hidden lg:block">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[11px] hover:text-primary-500 dark:text-gray-400">تماس با اپراتور</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[11px] hover:text-primary-500 dark:text-gray-400">ارسال تیکت</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[11px] hover:text-primary-500 dark:text-gray-400">چت آنلاین</a>
                                </li>
                            </ul>
                        </li>
                        <li class="p-2">
                            <a href="#" class="flex rounded items-center gap-3 px-4 py-3 text-xs text-gray-600 dark:text-gray-300 hover:bg-primary-50 dark:hover:bg-primary-900/20 hover:text-primary-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"/>
                                </svg>
                                سوالات متداول

                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 flex items-center gap-1 transition-colors group">
                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full animate-pulse group-hover:scale-125 transition-transform"></span>
                        شگفت‌انگیزها

                    </a>
                </li>
                <li>
                    <a href="#" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">پرفروش‌ترین‌ها</a>
                </li>
                <li>
                    <a href="#" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">وبلاگ</a>
                </li>

            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER -->
<main >


  @yield('content')
    <!-- END SHOP FEATURE -->
</main>
<!-- FOOTER -->
<footer class="relative amazing-glass-footer pt-24 pb-12 overflow-hidden transition-colors duration-500">
    <div class="container relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-24">
            <div class="contact-tile">
                <div class="icon-box bg-blue-500/10 text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" stroke-width="2"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-gray-400 mb-1">شماره تماس</h4>
                    <p class="text-sm font-black dark:text-white">۰۲۱-۹۱۰۰XXXX</p>
                </div>
            </div>
            <div class="contact-tile">
                <div class="icon-box bg-indigo-500/10 text-indigo-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-gray-400 mb-1">ساعات پاسخگویی</h4>
                    <p class="text-sm font-black dark:text-white">شنبه تا پنجشنبه، ۹ تا ۱۸</p>
                </div>
            </div>
            <div class="contact-tile">
                <div class="icon-box bg-purple-500/10 text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke-width="2"/>
                        <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-gray-400 mb-1">دفتر مرکزی</h4>
                    <p class="text-sm font-black dark:text-white">تهران، سعادت‌آباد، برج راستچین</p>
                </div>
            </div>
            <div class="contact-tile">
                <div class="icon-box bg-emerald-500/10 text-emerald-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="2"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-gray-400 mb-1">پشتیبانی ایمیلی</h4>
                    <p class="text-sm font-black dark:text-white">Support@Rtltheme.com</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-12 mb-24">
            <div class="xl:col-span-2 space-y-8">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center shadow-xl shadow-blue-600/30">
                        <span class="text-white text-2xl font-black">M</span>
                    </div>
                    <span class="text-2xl font-black text-gray-900 dark:text-white uppercase">
                                Mana<span class="text-blue-600">Shop</span>
                            </span>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-8 text-justify font-medium max-w-md">ماناشاپ فراتر از یک فروشگاه، یک اکوسیستم هوشمند است. ما با حذف واسطه‌ها، جدیدترین‌های تکنولوژی را با گارانتی معتبر و قیمتی رقابتی به خانه‌های شما می‌آوریم. شفافیت، اصالت و سرعت، سه رکن اصلی ماست.
                </p>
                <div class="flex gap-4">
                    <a href="#" class=" w-12 h-12 rounded-2xl bg-black/5 dark:bg-white/5 border border-black/5 dark:border-white/10 flex items-center justify-center text-gray-500 dark:text-gray-400 hover:bg-blue-600 hover:text-white hover:scale-110 transition-all duration-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path>
                        </svg>
                    </a>
                    <a href="#" class=" w-12 h-12 rounded-2xl bg-black/5 dark:bg-white/5 border border-black/5 dark:border-white/10 flex items-center justify-center text-gray-500 dark:text-gray-400 hover:bg-blue-600 hover:text-white hover:scale-110 transition-all duration-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                        </svg>
                    </a>
                    <a href="#" class=" w-12 h-12 rounded-2xl bg-black/5 dark:bg-white/5 border border-black/5 dark:border-white/10 flex items-center justify-center text-gray-500 dark:text-gray-400 hover:bg-blue-600 hover:text-white hover:scale-110 transition-all duration-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 22.954 24 17.99 24 12z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="space-y-8">
                <h3 class="footer-title">دسترسی سریع</h3>
                <ul class="space-y-5">
                    <li>
                        <a href="#" class="footer-link">گوشی‌های هوشمند</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">لپ‌تاپ و تبلت</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">گجت‌های پوشیدنی</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">لوازم جانبی</a>
                    </li>
                </ul>
            </div>
            <div class="space-y-8">
                <h3 class="footer-title">راهنمای خرید</h3>
                <ul class="space-y-5">
                    <li>
                        <a href="#" class="footer-link">پیگیری سفارش</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">شرایط مرجوعی</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">سوالات متداول</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">تماس با پشتیبانی</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-6 items-center lg:items-end">
                <h3 class="footer-title">مجوزهای قانونی</h3>
                <div class="flex gap-4">
                    <div class="w-28 h-36 bg-white/30 dark:bg-white/[0.02] backdrop-blur-xl rounded-2xl border border-gray-200 dark:border-white/10 flex flex-col items-center justify-center p-4 transition-all duration-500 hover:shadow-2xl hover:border-blue-500/30 group">
                        <div class="w-14 h-14 bg-gray-100 dark:bg-white/5 rounded-lg mb-4 flex items-center justify-center transition-all duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-width="2"/>
                            </svg>
                        </div>
                        <span class="text-[9px] font-black text-gray-400 dark:text-gray-500 uppercase tracking-[0.2em]">Enamad</span>
                    </div>
                    <div class="w-28 h-36 bg-white/30 dark:bg-white/[0.02] backdrop-blur-xl rounded-2xl border border-gray-200 dark:border-white/10 flex flex-col items-center justify-center p-4 transition-all duration-500 hover:shadow-2xl hover:border-blue-500/30 group">
                        <div class="w-14 h-14 bg-gray-100 dark:bg-white/5 rounded-lg mb-4 flex items-center justify-center transition-all duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" stroke-width="2"/>
                            </svg>
                        </div>
                        <span class="text-[9px] font-black text-gray-400 dark:text-gray-500 uppercase tracking-[0.2em]">Samandehi</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-10 border-t border-black/5 dark:border-white/5 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex items-center gap-4">
                <p class="text-[11px] text-gray-500 font-bold">
                    © ۲۰۲۵ طراحی و توسعه توسط <span class="text-gray-900 dark:text-white font-black underline decoration-blue-500/30 decoration-4">ManaTeam</span>
                    .
                </p>
            </div>
            <div class="flex flex-wrap justify-center gap-8">
                <a href="#" class="legal-link">شرایط خدمات</a>
                <a href="#" class="legal-link">سیاست حفظ حریم خصوصی</a>
                <a href="#" class="legal-link">کوکی‌ها</a>
                <a href="#" class="legal-link">امنیت</a>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
<!-- NAV MOBILE -->
<div class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[92%] max-w-[400px] z-[100] md:hidden">
    <div class="relative bg-white/70 dark:bg-black/60 backdrop-blur-2xl border border-white/40 dark:border-white/10 rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.3)] px-2 py-3">
        <ul class="flex items-center justify-around relative">
            <li class="relative">
                <a href="#" class="flex flex-col items-center gap-1 group relative px-4 py-1">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-8 h-1 bg-blue-600 rounded-full shadow-[0_0_15px_rgba(37,99,235,0.8)]"></div>
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 transition-transform group-active:scale-90" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg>
                    <span class="text-[10px] font-black text-blue-600 dark:text-blue-400">خانه</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex flex-col items-center gap-1 group px-4 py-1 text-gray-400 dark:text-gray-500">
                    <svg class="w-6 h-6 transition-transform group-active:scale-90" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                    <span class="text-[10px] font-black">دسته‌ها</span>
                </a>
            </li>
            <li class="-mt-12">
                <a href="#" class="relative flex items-center justify-center w-16 h-16 bg-blue-600 rounded-[1.8rem] text-white shadow-[0_10px_25px_rgba(37,99,235,0.5)] border-4 border-[#fafbfc] dark:border-[#050505] group transition-transform hover:scale-110 active:scale-95">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-[9px] font-black w-5 h-5 rounded-full flex items-center justify-center border-2 border-blue-600">۳</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex flex-col items-center gap-1 group px-4 py-1 text-gray-400 dark:text-gray-500">
                    <svg class="w-6 h-6 transition-transform group-active:scale-90" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span class="text-[10px] font-black">علاقه‌مندی</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex flex-col items-center gap-1 group px-4 py-1 text-gray-400 dark:text-gray-500">
                    <svg class="w-6 h-6 transition-transform group-active:scale-90" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span class="text-[10px] font-black">پروفایل</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END NAV MOBILE -->

<!-- END SEARCH MODAL -->


<!--CART DRAWER-->
{{--<div id="cart-drawer" class="fixed inset-0 z-[1100] pointer-events-none">--}}
{{--    <div class="absolute inset-0 bg-black/60 dark:bg-black/80 opacity-0 transition-opacity duration-500 backdrop-blur-sm drawer-overlay cursor-pointer"></div>--}}
{{--    <div class="absolute left-0 top-0 h-full w-full max-w-[420px] bg-white/70 dark:bg-gray-950/80 backdrop-blur-2xl shadow-2xl transform -translate-x-full transition-transform duration-500 pointer-events-auto flex flex-col border-r border-white/20 dark:border-white/5">--}}
{{--        <div class="p-6 border-b border-gray-200/50 dark:border-white/5 flex justify-between items-center bg-white/30 dark:bg-white/5">--}}
{{--            <h3 class="font-black text-lg dark:text-white flex items-center gap-2">--}}
{{--                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>--}}
{{--                </svg>--}}
{{--                سبد خرید <span id="cart-header-count" class="text-xs font-normal text-gray-400 dark:text-gray-500">(۰ کالا)</span>--}}
{{--            </h3>--}}
{{--            <button class="close-cart p-2 hover:bg-red-500/10 hover:text-red-500 rounded-xl transition-all dark:text-white">--}}
{{--                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--        <div id="cart-items-container" class="flex-1 overflow-y-auto p-5 flex flex-col" dir="rtl">--}}
{{--            <div id="empty-cart-msg" class="hidden flex-1 flex-col items-center justify-center text-center animate-fadeIn">--}}
{{--                <div class="w-24 h-24 bg-gray-100/50 dark:bg-white/5 rounded-full flex items-center justify-center mb-6 border border-dashed border-gray-300 dark:border-white/10 shadow-inner">--}}
{{--                    <svg class="w-10 h-10 text-gray-400 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <h4 class="text-gray-800 dark:text-gray-200 font-black text-lg mb-2">سبد خرید شما خالی است!</h4>--}}
{{--                <p class="text-sm text-gray-500 dark:text-gray-400 max-w-[250px] leading-6 mb-8">به‌نظر می‌رسد هنوز هیچ محصولی را به سبد خرید خود اضافه نکرده‌اید.</p>--}}
{{--                <button onclick="document.querySelector('.close-cart').click()" class="px-6 py-2.5 rounded-xl border border-blue-500/30 text-blue-600 dark:text-blue-400 font-bold text-sm hover:bg-blue-500 hover:text-white transition-all duration-300">شروع خرید از فروشگاه</button>--}}
{{--            </div>--}}
{{--            <div id="actual-items-list" class="space-y-4">--}}
{{--                <div class="product-row group relative flex gap-4 p-3 rounded-[1.8rem] bg-white/50 dark:bg-white/[0.03] border border-white/60 dark:border-white/5 shadow-sm transition-all duration-500 hover:bg-white dark:hover:bg-white/[0.08]">--}}
{{--                    <div class="relative w-24 h-24 bg-white dark:bg-gray-800 rounded-[1.4rem] flex-shrink-0 p-3 shadow-inner border border-gray-100 dark:border-white/5">--}}
{{--                        <img src="../front/assets/images/product/laptop-3.png" class="w-full h-full object-contain">--}}
{{--                    </div>--}}
{{--                    <div class="flex flex-col justify-between flex-1 py-1">--}}
{{--                        <div class="flex justify-between items-start">--}}
{{--                            <h4 class="text-[13px] font-black text-gray-800 dark:text-gray-100 line-clamp-2">لپ‌تاپ ایسوس ROG Zephyrus G14</h4>--}}
{{--                            <button class="remove-item-btn text-gray-400 hover:text-red-500 transition-colors p-1">--}}
{{--                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                                    <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2"/>--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="flex justify-between items-end mt-2">--}}
{{--                                    <span class="unit-price text-blue-600 dark:text-blue-400 font-black text-sm" data-price="38500000">--}}
{{--                                        ۳۸,۵۰۰,۰۰۰ <span class="text-[10px]">تومان</span>--}}
{{--                                    </span>--}}
{{--                            <div class="flex items-center gap-2 bg-gray-100/80 dark:bg-[#0a0a0a]/40 backdrop-blur-md rounded-xl p-1 border border-gray-200/50 dark:border-white/5">--}}
{{--                                <button class="cart-counter-btn w-7 h-7 flex items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow-sm" data-action="increase">+</button>--}}
{{--                                <span class="item-count w-6 text-center text-xs font-black dark:text-white">1</span>--}}
{{--                                <button class="cart-counter-btn w-7 h-7 flex items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow-sm" data-action="decrease">-</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="product-row group relative flex gap-4 p-3 rounded-[1.8rem] bg-white/50 dark:bg-white/[0.03] border border-white/60 dark:border-white/5 shadow-sm transition-all duration-500 hover:bg-white dark:hover:bg-white/[0.08]">--}}
{{--                    <div class="relative w-24 h-24 bg-white dark:bg-gray-800 rounded-[1.4rem] flex-shrink-0 p-3 shadow-inner border border-gray-100 dark:border-white/5">--}}
{{--                        <img src="../front/assets/images/product/mobile-4.png" class="w-full h-full object-contain">--}}
{{--                    </div>--}}
{{--                    <div class="flex flex-col justify-between flex-1 py-1">--}}
{{--                        <div class="flex justify-between items-start">--}}
{{--                            <h4 class="text-[13px] font-black text-gray-800 dark:text-gray-100 line-clamp-2">گوشی موبایل iPhone 15 Pro</h4>--}}
{{--                            <button class="remove-item-btn text-gray-400 hover:text-red-500 transition-colors p-1">--}}
{{--                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                                    <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2"/>--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="flex justify-between items-end mt-2">--}}
{{--                                    <span class="unit-price text-blue-600 dark:text-blue-400 font-black text-sm" data-price="62000000">--}}
{{--                                        ۶۲,۰۰۰,۰۰۰ <span class="text-[10px]">تومان</span>--}}
{{--                                    </span>--}}
{{--                            <div class="flex items-center gap-2 bg-gray-100/80 dark:bg-[#0a0a0a]/40 backdrop-blur-md rounded-xl p-1 border border-gray-200/50 dark:border-white/5">--}}
{{--                                <button class="cart-counter-btn w-7 h-7 flex items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow-sm" data-action="increase">+</button>--}}
{{--                                <span class="item-count w-6 text-center text-xs font-black dark:text-white">1</span>--}}
{{--                                <button class="cart-counter-btn w-7 h-7 flex items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow-sm" data-action="decrease">-</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div id="cart-footer" class="p-8 border-t border-gray-200/50 dark:border-white/5 space-y-5 bg-white/40 dark:bg-gray-950/40 backdrop-blur-md">--}}
{{--            <div class="flex justify-between items-center text-sm">--}}
{{--                <span class="text-gray-500 dark:text-gray-400 font-bold">مجموع سبد خرید:</span>--}}
{{--                <span id="total-price-display" class="font-black text-xl dark:text-white text-blue-600 dark:text-blue-400">--}}
{{--                            ۰ <span class="text-[10px]">تومان</span>--}}
{{--                        </span>--}}
{{--            </div>--}}
{{--            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-5 rounded-[2rem] shadow-xl shadow-blue-500/30 transition-all flex items-center justify-center gap-3 group relative overflow-hidden">--}}
{{--                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>--}}
{{--                ثبت سفارش نهایی--}}

{{--                <svg class="w-5 h-5 group-hover:translate-x-[-4px] transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!--END CART DRAWER-->
<!--Mobile Menu-->
<div id="mobile-menu" class="fixed inset-0 z-[1100] pointer-events-none">
    <div class="absolute inset-0 bg-black/40 dark:bg-black/70 opacity-0 transition-opacity duration-500 backdrop-blur-sm menu-overlay cursor-pointer"></div>
    <div class="absolute right-0 top-0 h-full w-[320px] bg-white/70 dark:bg-gray-950/80 backdrop-blur-2xl shadow-[-15px_0_50px_rgba(0,0,0,0.2)] transform translate-x-full transition-transform duration-500 pointer-events-auto flex flex-col border-l border-white/40 dark:border-white/10">
        <div class="p-5 border-b border-white/40 dark:border-gray-800 flex justify-between items-center bg-white/30 dark:bg-gray-900/30">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center shadow-lg shadow-blue-500/40">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16m-7 6h7" stroke-width="2.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <span class="font-black text-xl dark:text-white">منوی اصلی</span>
            </div>
            <button class="close-menu p-2 hover:bg-red-50 dark:hover:bg-red-900/20 text-gray-400 hover:text-red-500 rounded-xl transition-all border border-transparent hover:border-red-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
        <div class="flex-1 overflow-y-auto custom-scrollbar pt-2">
            <div class="px-4 mb-6">
                <div onclick="openLoginModal()" class="p-4 rounded-[2rem] bg-gradient-to-br from-blue-600 to-indigo-700 text-white shadow-xl shadow-blue-500/20 flex items-center justify-between cursor-pointer group transition-all active:scale-95">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center border border-white/30">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-width="1.5"/>
                            </svg>
                        </div>
                        <div>
                            <span class="block font-black text-sm">ورود یا ثبت‌نام</span>
                            <span class="block text-[10px] opacity-70 mt-0.5">مشاهده پنل کاربری</span>
                        </div>
                    </div>
                    <svg class="w-5 h-5 opacity-50 group-hover:translate-x-[-5px] transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" stroke-width="3"/>
                    </svg>
                </div>
            </div>
            <nav class="px-3 pb-20">
                <!--Product classification-->
                <div class="flex items-center gap-2 px-3 mb-3">
                    <span class="w-1 h-4 bg-blue-600 rounded-full"></span>
                    <span class="text-[11px] font-black text-gray-400 uppercase tracking-widest">دسته‌بندی کالاها</span>
                </div>
                <ul class="space-y-3">
                    <!--Digital goods-->
                    <li class="menu-item">
                        <button class="layer-btn w-full flex items-center justify-between p-4 rounded-2xl bg-white/40 dark:bg-white/5 border border-white/60 dark:border-white/10 shadow-sm transition-all hover:bg-white/60">
                            <div class="flex items-center gap-3 text-gray-800 dark:text-gray-200">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="1.5"/>
                                </svg>
                                <span class="font-black text-sm">کالای دیجیتال</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 arrow-icon transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M19 9l-7 7-7-7" stroke-width="3"/>
                            </svg>
                        </button>
                        <ul class="hidden submenu mt-2 mr-2 space-y-2 border-r-2 border-blue-500/20 pr-2 overflow-hidden transition-all duration-300">
                            <li>
                                <button class="layer-btn w-full flex items-center justify-between p-3 rounded-xl bg-white/30 dark:bg-white/5 border border-white/40 hover:bg-blue-50/50">
                                    <span class="font-bold text-xs text-gray-700 dark:text-gray-300">گوشی موبایل</span>
                                    <svg class="w-3 h-3 text-gray-400 arrow-icon transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 9l-7 7-7-7" stroke-width="3"/>
                                    </svg>
                                </button>
                                <ul class="hidden submenu mt-2 mr-2 space-y-2 border-r-2 border-gray-400/20 pr-2">
                                    <li>
                                        <button class="layer-btn w-full flex items-center justify-between p-2 rounded-lg bg-white/20 dark:bg-white/5 text-gray-600 dark:text-gray-400">
                                            <span class="font-bold text-[11px]">گوشی اپل (iPhone)</span>
                                            <svg class="w-3 h-3 text-gray-400 arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M19 9l-7 7-7-7" stroke-width="3"/>
                                            </svg>
                                        </button>
                                        <ul class="hidden submenu mt-1 mr-2 space-y-1 pr-4 bg-gray-50/50 dark:bg-black/20 rounded-lg">
                                            <li>
                                                <a href="#" class="block p-3 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">سری iPhone 15</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block p-3 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">سری iPhone 14</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block p-3 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">سری iPhone 13</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block p-3 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">سری iPhone 12</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block p-3 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">سری iPhone SE</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <button class="layer-btn w-full flex items-center justify-between p-2 rounded-lg bg-white/20 dark:bg-white/5 text-gray-600 dark:text-gray-400">
                                            <span class="font-bold text-[11px]">گوشی سامسونگ</span>
                                            <svg class="w-3 h-3 text-gray-400 arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M19 9l-7 7-7-7" stroke-width="3"/>
                                            </svg>
                                        </button>
                                        <ul class="hidden submenu mt-1 mr-2 space-y-1 pr-4 bg-gray-50/50 dark:bg-black/20 rounded-lg">
                                            <li>
                                                <a href="#" class="block p-3 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">سری Galaxy S</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block p-3 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">سری Galaxy A</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block p-3 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">سری Galaxy Z</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="block p-2 pl-4 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">گوشی شیائومی</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block p-2 pl-4 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">گوشی هوآوی</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block p-2 pl-4 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">گوشی انارد</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <button class="layer-btn w-full flex items-center justify-between p-3 rounded-xl bg-white/30 dark:bg-white/5 border border-white/40 hover:bg-blue-50/50">
                                    <span class="font-bold text-xs text-gray-700 dark:text-gray-300">لپ‌تاپ و کامپیوتر</span>
                                    <svg class="w-3 h-3 text-gray-400 arrow-icon transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 9l-7 7-7-7" stroke-width="3"/>
                                    </svg>
                                </button>
                                <ul class="hidden submenu mt-2 mr-2 space-y-2 border-r-2 border-gray-400/20 pr-2">
                                    <li>
                                        <a href="#" class="block p-2 pl-4 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">لپ‌تاپ گیمینگ</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block p-2 pl-4 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">لپ‌تاپ تجاری</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block p-2 pl-4 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">مک‌بوک اپل</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block p-2 pl-4 text-[10px] text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors">قطعات کامپیوتر</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-between p-3 rounded-xl bg-white/30 dark:bg-white/5 border border-white/40 hover:bg-blue-50/50">
                                    <span class="font-bold text-xs text-gray-700 dark:text-gray-300">هدفون و هندزفری</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-between p-3 rounded-xl bg-white/30 dark:bg-white/5 border border-white/40 hover:bg-blue-50/50">
                                    <span class="font-bold text-xs text-gray-700 dark:text-gray-300">ساعت هوشمند</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-between p-3 rounded-xl bg-white/30 dark:bg-white/5 border border-white/40 hover:bg-blue-50/50">
                                    <span class="font-bold text-xs text-gray-700 dark:text-gray-300">کنسول بازی</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!--The amazing-->
                    <li>
                        <a href="#" class="flex items-center gap-3 p-4 rounded-2xl bg-white/40 dark:bg-white/5 border border-white/60 dark:border-white/10 shadow-sm text-gray-800 dark:text-gray-200 font-black text-sm">
                            <svg class="w-5 h-5 text-secondary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-width="1.5"/>
                            </svg>
                            شگفت‌انگیزها

                        </a>
                    </li>
                    <!--Special sale-->
                    <li>
                        <a href="#" class="flex items-center gap-3 p-4 rounded-2xl bg-gradient-to-r from-red-500 to-secondary-500 text-white shadow-lg shadow-red-500/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" stroke-width="1.5"/>
                            </svg>
                            <span class="font-black text-sm">فروش ویژه</span>
                        </a>
                    </li>
                </ul>
                <!--Customer service-->
                <div class="flex items-center gap-2 px-3 mt-8 mb-3">
                    <span class="w-1 h-4 bg-blue-600 rounded-full"></span>
                    <span class="text-[11px] font-black text-gray-400 uppercase tracking-widest">خدمات مشتریان</span>
                </div>
                <ul class="space-y-3 mb-6">
                    <li>
                        <a href="#" class="flex items-center gap-3 p-3 rounded-xl bg-white/40 dark:bg-white/5 border border-white/60 dark:border-white/10 text-gray-700 dark:text-gray-300 text-xs">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" stroke-width="1.5"/>
                            </svg>
                            پشتیبانی 24 ساعته

                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-3 p-3 rounded-xl bg-white/40 dark:bg-white/5 border border-white/60 dark:border-white/10 text-gray-700 dark:text-gray-300 text-xs">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="1.5"/>
                            </svg>
                            سوالات متداول

                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-3 p-3 rounded-xl bg-white/40 dark:bg-white/5 border border-white/60 dark:border-white/10 text-gray-700 dark:text-gray-300 text-xs">
                            <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-width="1.5"/>
                            </svg>
                            گارانتی و ضمانت

                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-3 p-3 rounded-xl bg-white/40 dark:bg-white/5 border border-white/60 dark:border-white/10 text-gray-700 dark:text-gray-300 text-xs">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M3 10h11M3 14h7m10-8v8a2 2 0 01-2 2h-4.586l-1.707 1.707a1 1 0 01-1.414 0L7.586 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2z" stroke-width="1.5"/>
                            </svg>
                            بازگرداندن کالا

                        </a>
                    </li>
                </ul>
                <!--Contact information-->
                <div class="mt-8 pt-6 border-t border-white/40 dark:border-gray-800 space-y-6">
                    <div class="flex flex-col gap-3 px-3">
                        <a href="tel:0210000" class="flex items-center gap-3 text-xs font-bold text-gray-500 dark:text-gray-400">
                            <svg class="w-5 h-5 p-1 bg-white dark:bg-gray-800 rounded-lg shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" stroke-width="1.5"/>
                            </svg>
                            پشتیبانی: 123456-021

                        </a>
                        <a href="mailto:info@digikala.com" class="flex items-center gap-3 text-xs font-bold text-gray-500 dark:text-gray-400">
                            <svg class="w-5 h-5 p-1 bg-white dark:bg-gray-800 rounded-lg shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="1.5"/>
                            </svg>
                            ایمیل: info@digikala.com

                        </a>
                    </div>
                    <!-- شبکه‌های اجتماعی -->
                    <div class="flex gap-4">
                        <a href="#" class="w-12 h-12 rounded-2xl bg-gray-50 dark:bg-gray-900 border border-gray-100 dark:border-gray-800 flex items-center justify-center text-gray-400 hover:text-blue-600 hover:border-blue-600 transition-all group">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-2xl bg-gray-50 dark:bg-gray-900 border border-gray-100 dark:border-gray-800 flex items-center justify-center text-gray-400 hover:text-blue-400 hover:border-blue-400 transition-all group">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-2xl bg-gray-50 dark:bg-gray-900 border border-gray-100 dark:border-gray-800 flex items-center justify-center text-gray-400 hover:text-blue-400 hover:border-blue-400 transition-all group">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 64 64">
                                <path fill="currentColor" d="m62.8 10.8l-9.4 44c-.7 3.1-2.5 3.8-5.1 2.4L34.2 46.8l-6.9 6.6c-.7.7-1.4 1.4-3 1.4l1.1-14.5l26.3-23.9c1.1-1.1-.3-1.5-1.7-.6L17.3 36.4L3.2 32.1c-3.1-1-3.1-3.1.7-4.5L58.7 6.3c2.7-.8 5 .6 4.1 4.5"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-2xl bg-gray-50 dark:bg-gray-900 border border-gray-100 dark:border-gray-800 flex items-center justify-center text-gray-400 hover:text-blue-400 hover:border-blue-400 transition-all group">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <!-- Icon from Tabler Icons by Paweł Kuna - https://github.com/tabler/tabler-icons/blob/master/LICENSE -->
                                <path fill="currentColor" d="M18 3a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H6a5 5 0 0 1-5-5V8a5 5 0 0 1 5-5zM9 9v6a1 1 0 0 0 1.514.857l5-3a1 1 0 0 0 0-1.714l-5-3A1 1 0 0 0 9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!--END Mobile Menu-->
<script src="{{asset('front/assets/js/plugin/story-player/story-player.js')}}"></script>
<script src="{{asset('front/assets/js/plugin/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('front/assets/js/dependencies/swiper-script.js')}}"></script>
<script src="{{asset('front/assets/js/dependencies/app.js')}}"></script>
<!-- INITIAL STORY SECTION -->
@stack('scripts')

</body>
</html>

