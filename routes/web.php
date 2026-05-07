<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class,'index'])->name('home');

 //admin
Route::prefix('/admin')->group(function(){
   Route::get('/index', [adminController::class,'index'])->name('admin.index');

   Route::prefix('/category')->group(function(){
      Route::prefix('/mega-category')->group(function(){
         Route::get('/index', [AdminCategoryController::class,'megaCategoryIndex'])->name('admin.mega-category.index');
         Route::get('/create', [AdminCategoryController::class,'megaCategoryCreate'])->name('admin.mega-category.create');
         Route::post('/store', [AdminCategoryController::class,'megaCategoryStore'])->name('admin.mega-category.store');
         Route::get('/edit/{mega_category}', [AdminCategoryController::class,'megaCategoryEdit'])->name('admin.mega-category.edit');
         Route::post('/update/{mega_category}', [AdminCategoryController::class,'megaCategoryUpdate'])->name('admin.mega-category.update');
         Route::delete('/delete/{mega_category}', [AdminCategoryController::class,'megaCategoryDelete'])->name('admin.mega-category.delete');
      });
      Route::prefix('/super-category')->group(function(){
         Route::get('/index/{mega_category}', [AdminCategoryController::class,'superCategoryIndex'])->name('admin.super-category.index');
         Route::get('/create/{mega_category}', [AdminCategoryController::class,'superCategoryCreate'])->name('admin.super-category.create');
         Route::get('/edit/{super_category}', [AdminCategoryController::class,'superCategoryEdit'])->name('admin.super-category.edit');
         Route::post('/store', [AdminCategoryController::class,'superCategoryStore'])->name('admin.super-category.store');
         Route::post('/update/{super_category}', [AdminCategoryController::class,'superCategoryUpdate'])->name('admin.super-category.update');
         Route::delete('/delete/{super_category}', [AdminCategoryController::class,'superCategoryDelete'])->name('admin.super-category.delete');
      });
      Route::prefix('/primary-category')->group(function(){
          Route::get('/index/{super_category}', [AdminCategoryController::class,'primaryCategoryIndex'])->name('admin.primary-category.index');
          Route::get('/create/{super_category}', [AdminCategoryController::class,'primaryCategoryCreate'])->name('admin.primary-category.create');
          Route::post('/store', [AdminCategoryController::class,'primaryCategoryStore'])->name('admin.primary-category.store');
          Route::get('/edit/{category}', [AdminCategoryController::class,'primaryCategoryEdit'])->name('admin.primary-category.edit');
          Route::post('/update/{category}', [AdminCategoryController::class,'primaryCategoryUpdate'])->name('admin.primary-category.update');
          Route::delete('/delete/{category}', [AdminCategoryController::class,'primaryCategoryDelete'])->name('admin.primary-category.delete');
      });
      Route::prefix('/product')->group(function(){
         Route::get('/index/{category}', [AdminCategoryController::class,'categoryProductIndex'])->name('admin.category.product.index');
      });
   });
   Route::prefix('/product')->group(function(){
         Route::get('/index', [AdminProductController::class,'index'])->name('admin.product.index');
         Route::get('/create', [AdminProductController::class,'create'])->name('admin.product.create');
         Route::post('/store', [AdminProductController::class,'store'])->name('admin.product.store');
         Route::get('/edit/{product}', [AdminProductController::class,'edit'])->name('admin.product.edit');
         Route::put('/update/{product}', [AdminProductController::class,'update'])->name('admin.product.update');
         Route::delete('/delete/{product}', [AdminProductController::class,'delete'])->name('admin.product.delete');
         Route::get('/excel/create', [AdminProductController::class,'excelCreate'])->name('admin.product.excel.create');
         Route::post('/excel/import', [AdminProductController::class,'excelImport'])->name('admin.product.excel.import');
         Route::get('/excel/template', [AdminProductController::class,'excelTemplate'])->name('admin.product.excel.template');
         Route::get('/excel/create-sub-product',[AdminProductController::class,'excelCreateSubProduct'])->name('admin.product.excel.create-sub-product');
         Route::post('/excel/import-sub-products', [AdminProductController::class, 'importSubProducts'])->name('products.import-sub-products');
         Route::get('/excel/sub-product-template', [AdminProductController::class, 'downloadSubProductTemplate'])->name('products.download-sub-product-template');
       Route::put('subproduct/{subproduct}',
           [AdminProductController::class,'updateSubProduct'])
           ->name('admin.subproduct.update');

       Route::delete('subproduct/{subproduct}',
           [AdminProductController::class,'destroySubProduct'])
           ->name('admin.subproduct.destroy');

       Route::get('subproduct/{subproduct}/edit',
           [AdminProductController::class,'editSubProduct'])
           ->name('admin.subproduct.edit');
   });


});


//endAdmin
