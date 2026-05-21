@extends('front.layout.master')

@section('content')
    <!-- PRODUCTS SECTION -->
    <section class="relative overflow-hidden py-16 transition-colors duration-700">
        <div class="container relative z-10">
            <!-- Header -->
            <div class="flex items-end justify-between mb-10 gap-4 flex-wrap">
                <div class="flex items-center gap-6">
                    <div class="relative group">
                        <div class="relative w-16 h-16 bg-white dark:bg-black border border-gray-100 dark:border-blue-500/40 rounded-[1.8rem] flex items-center justify-center text-blue-600 shadow-2xl">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">محصولات</h2>
                        <p class="text-[10px] font-black text-blue-500 uppercase tracking-[0.4em] mt-2 flex items-center gap-2">
                            <span class="w-8 h-[2px] bg-blue-500/30"></span>
                            Products
                        </p>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <form method="GET" action="{{ url()->current() }}" id="filterForm" class="mb-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Search Box -->
                    <div class="relative">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="جستجوی محصول..."
                               class="w-full px-5 py-3 pr-12 rounded-2xl bg-white dark:bg-gray-800/80 border border-gray-200 dark:border-gray-700 text-sm font-bold text-gray-700 dark:text-gray-200 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition-all shadow-sm hover:shadow-md backdrop-blur-xl">
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 dark:text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="relative">
                        <select name="category"
                                id="categorySelect"
                                class="w-full px-5 py-3 pr-12 pl-10 rounded-2xl bg-white dark:bg-gray-800/80 border border-gray-200 dark:border-gray-700 text-sm font-bold text-gray-700 dark:text-gray-200 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition-all appearance-none cursor-pointer shadow-sm hover:shadow-md backdrop-blur-xl">
                            <option value="">همه دسته‌بندی‌ها</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 dark:text-gray-500 category-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Sort Select Box -->
                    <div class="relative">
                        <select name="sort"
                                onchange="document.getElementById('filterForm').submit()"
                                class="w-full px-5 py-3 pr-12 pl-10 rounded-2xl bg-white dark:bg-gray-800/80 border border-gray-200 dark:border-gray-700 text-sm font-bold text-gray-700 dark:text-gray-200 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition-all appearance-none cursor-pointer shadow-sm hover:shadow-md backdrop-blur-xl">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>جدیدترین</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>ارزان‌ترین</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>گران‌ترین</option>
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 dark:text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                            </svg>
                        </div>
                        <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 dark:text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Search Button (Mobile) -->
                <div class="mt-4 md:hidden">
                    <button type="submit" class="w-full px-5 py-3 rounded-2xl bg-blue-600 dark:bg-blue-500 text-white font-bold text-sm shadow-lg hover:shadow-xl transition-all">
                        جستجو
                    </button>
                </div>
            </form>

            @if($products->isEmpty())
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center py-20">
                    <div class="relative w-32 h-32 mb-6">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-purple-500/20 dark:from-blue-500/10 dark:to-purple-500/10 rounded-full blur-2xl"></div>
                        <div class="relative w-full h-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full flex items-center justify-center shadow-xl">
                            <svg class="w-16 h-16 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-black text-gray-800 dark:text-gray-200 mb-2">محصولی یافت نشد</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">در حال حاضر محصولی برای نمایش وجود ندارد</p>
                </div>
            @else
                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <div class="group relative h-full">
                            <!-- Card Background -->
                            <div class="absolute inset-0 bg-white/80 dark:bg-[#0a0a0a]/40 backdrop-blur-3xl rounded-[2.8rem] border border-gray-100 dark:border-white/5 shadow-sm transition-all duration-500 group-hover:border-blue-400/40 group-hover:shadow-blue-500/15"></div>

                            <!-- Card Content -->
                            <div class="relative p-5 flex flex-col h-full z-10 transition-transform duration-500 group-hover:-translate-y-2">

                                <!-- Product Image -->
                                <a href="{{route('product.detail',$product->slug)}}" class="block relative mb-4 overflow-hidden rounded-[2rem] h-56 shadow-lg">
                                    <img src="@if($product->image) {{ asset('product/'.$product->image) }}@else {{asset('category/'.$product->category->image)}} @endif "
                                         class="w-full h-full object-cover transition-all duration-1000 group-hover:scale-110"
                                         alt="{{ $product->image_alt }}"
                                         title="{{ $product->image_title }}">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

                                    <!-- Discount Badge -->
                                    @if($product->discount > 0)
                                        <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1.5 rounded-xl text-xs font-black shadow-lg">
                                            {{  round(($product->discount* 100 / $product->price))  }}% تخفیف
                                        </div>
                                    @endif
                                </a>

                                <!-- Product Info -->
                                <div class="flex-1 flex flex-col">
                                    <!-- Product Name -->
                                    <a href="{{route('product.detail',$product->slug)}}" class="block mb-3">
                                        <h3 class="text-[16px] font-black text-gray-800 dark:text-gray-100 leading-6 line-clamp-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                            {{ $product->name }}
                                        </h3>
                                    </a>
                                    <a href="{{route('category',['slug'=>$product->category->slug])}}"
                                       class="text-xs text-gray-500 dark:text-gray-400 mb-4 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                        دسته بندی: {{ $product->category->name }}
                                    </a>

                                    <!-- Product Code -->
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-4">
                                        کد: {{ $product->code }}
                                    </p>

                                    <!-- Sub Products Dropdown -->
                                    @if($product->has_sub_product && $product->subProducts->count() > 0)
                                        <div class="mb-4 relative">
                                            <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 mb-2">انتخاب نوع:</label>
                                            <div class="relative">
                                                <select class="sub-product-select w-full px-3 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-600 text-sm text-gray-900 dark:text-white focus:border-blue-500 dark:focus:border-blue-400 outline-none transition-all appearance-none cursor-pointer"
                                                        data-product-id="{{ $product->id }}">
                                                    <option value="{{ $product->id }}"
                                                            data-price="{{ $product->price }}"
                                                            data-discount="{{ $product->discount }}">
                                                        پیش‌فرض
                                                    </option>
                                                    @foreach($product->subProducts as $subProduct)
                                                        <option value="{{ $subProduct->id }}"
                                                                data-price="{{ $subProduct->price }}"
                                                                data-discount="{{ $subProduct->discount }}">
                                                            {{ $subProduct->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Price Section -->
                                    <div class="mt-auto pt-4 border-t border-gray-100 dark:border-white/5">
                                        <div class="price-container" data-product-id="{{ $product->id }}">
                                            @php
                                                $finalPrice = $product->price;
                                                $hasDiscount = $product->discount > 0;
                                                if($hasDiscount) {
                                                    $finalPrice = $product->price - $product->discount ;
                                                }
                                            @endphp

                                            @if($hasDiscount)
                                                <!-- Original Price (Crossed) -->
                                                <div class="discount-box flex items-center gap-2 mb-2">
                                                    <span class="text-sm text-gray-400 dark:text-gray-500 line-through">
                                                        {{ number_format($product->price) }}
                                                    </span>
                                                    <span class="text-xs text-red-500 font-bold">
                                                        {{ round(($product->discount* 100 / $product->price)) }}%
                                                    </span>
                                                </div>
                                            @endif

                                            <!-- Final Price -->
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-baseline gap-1">
                                                    <span class="text-2xl font-black text-gray-900 dark:text-white final-price">
                                                        {{ number_format($finalPrice) }}
                                                    </span>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400">تومان</span>
                                                </div>

                                                <!-- Add to Cart Button -->
                                                <button class="w-10 h-10 bg-blue-600 dark:bg-blue-500 text-white rounded-xl flex items-center justify-center shadow-lg hover:scale-110 transition-all disabled:opacity-50 disabled:cursor-not-allowed"
                                                    {{ $product->count == 0 ? 'disabled' : '' }}>
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($products->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $products->appends(['sort' => request('sort'), 'search' => request('search'), 'category' => request('category')])->links() }}
                    </div>
                @endif

            @endif
        </div>
    </section>
    <!-- END PRODUCTS SECTION -->
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const subProductSelects = document.querySelectorAll('.sub-product-select');

            subProductSelects.forEach(select => {
                select.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const price = parseFloat(selectedOption.dataset.price);
                    const discount = parseFloat(selectedOption.dataset.discount);
                    const productId = this.dataset.productId;

                    const priceContainer = document.querySelector(`.price-container[data-product-id="${productId}"]`);
                    const finalPriceElement = priceContainer.querySelector('.final-price');

                    let finalPrice = price;
                    let discountPercent = 0;

                    if(discount > 0){
                        finalPrice = price - discount;
                        discountPercent = Math.round((discount * 100) / price);
                    }

                    finalPriceElement.textContent = finalPrice.toLocaleString('fa-IR');

                    let discountBox = priceContainer.querySelector('.discount-box');

                    if(discount > 0){
                        if(!discountBox){
                            discountBox = document.createElement('div');
                            discountBox.className = "discount-box flex items-center gap-2 mb-2";
                            priceContainer.prepend(discountBox);
                        }

                        discountBox.innerHTML = `
                            <span class="text-sm text-gray-400 dark:text-gray-500 line-through">
                                ${price.toLocaleString('fa-IR')}
                            </span>
                            <span class="text-xs text-red-500 font-bold">
                                ${discountPercent}%
                            </span>
                        `;
                    }else{
                        if(discountBox){
                            discountBox.remove();
                        }
                    }
                });
            });
        });
    </script>
@endpush
