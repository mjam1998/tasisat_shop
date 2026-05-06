<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use App\Rules\SlugRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminProductController extends Controller
{
    public function index(){
        return view('admin.product.index');
    }

    public function create(){
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'category_id'      => 'required|exists:categories,id',
            'name'             => 'required|string|max:400',
            'slug' => [
                'required',
                'string',
                'max:400',
                'unique:products,slug,',
                new SlugRule(),
            ],
            'code'             => 'required|string|max:400|unique:products,code',
            'size'             => 'nullable|string|max:400',
            'count'            => 'nullable|integer|min:0',
            'price'            => 'required|numeric|min:0',
            'discount'         => 'nullable|numeric|min:0',
            'description'      => 'nullable',
            'meta_title'       => 'nullable|string|max:400',
            'meta_description' => 'nullable|string|max:400',
            'keywords'         => 'nullable|string|max:400',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5148',
            'image_alt'        => 'nullable|string|max:400',
            'image_title'      => 'nullable|string|max:400',
        ], [
            // پیام‌های فارسی
            'category_id.required' => 'انتخاب دسته‌بندی الزامی است.',
            'category_id.exists'   => 'دسته‌بندی انتخاب شده معتبر نیست.',

            'name.required' => 'وارد کردن نام محصول الزامی است.',
            'name.max'       => 'طول نام محصول نباید بیشتر از ۴۰۰ کاراکتر باشد.',

            'slug.required' => 'وارد کردن اسلاگ الزامی است.',
            'slug.max'       => 'طول اسلاگ نباید بیشتر از ۴۰۰ کاراکتر باشد.',
            'slug.unique'    => 'این اسلاگ قبلاً استفاده شده است.',
            'image.image' => 'فایل انتخابی باید تصویر باشد',
            'image.mimes' => 'فرمت تصویر باید jpeg، png، jpg یا webp باشد',
            'image.max' => 'حجم تصویر نباید بیشتر از 5 مگابایت باشد',
            'code.required' => 'وارد کردن کد محصول الزامی است.',
            'code.max'       => 'طول کد محصول نباید بیشتر از ۴۰۰ کاراکتر باشد.',
            'code.unique'    => 'این کد محصول قبلاً ثبت شده است.',

            'size.max' => 'طول مقدار سایز نباید بیشتر از ۴۰۰ کاراکتر باشد.',

            'count.required' => 'وارد کردن تعداد موجودی الزامی است.',
            'count.integer'  => 'مقدار موجودی باید عدد صحیح باشد.',
            'count.min'      => 'مقدار موجودی نمی‌تواند منفی باشد.',

            'price.required' => 'وارد کردن قیمت الزامی است.',
            'price.numeric'  => 'قیمت باید یک مقدار عددی باشد.',
            'price.min'      => 'قیمت نمی‌تواند منفی باشد.',

            'discount.numeric' => 'تخفیف باید یک مقدار عددی باشد.',
            'discount.min'     => 'تخفیف نمی‌تواند منفی باشد.',

            'description.required' => 'توضیحات الزامی هست.',

            'meta_title.max'         => 'طول meta title نباید بیشتر از ۴۰۰ کاراکتر باشد.',
            'meta_description.max'   => 'طول meta description نباید بیشتر از ۴۰۰ کاراکتر باشد.',
            'keywords.max'           => 'طول کلمات کلیدی نباید بیشتر از ۴۰۰ کاراکتر باشد.',

            'image_alt.max'          => 'طول متن جایگزین تصویر نباید بیشتر از ۴۰۰ کاراکتر باشد.',
            'image_title.max'        => 'طول عنوان تصویر نباید بیشتر از ۴۰۰ کاراکتر باشد.',
        ]);
        if ($request->hasFile("image")) {
            $file = $request->file("image");

            $ext = $file->getClientOriginalExtension();
            $filename =  $data['code']. "." . $ext;
            $file->storeAs('product', $filename, 'public');
            $data['image'] = $filename;
        }
        Product::create($data);
        return redirect()->route('admin.product.index')->with('success',' محصول با موفقیت افزوده شد.');

    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('product','categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'category_id'      => 'required|exists:categories,id',
            'name'             => 'required|string|max:400',
            'slug' => [
                'required',
                'string',
                'max:400',
                'unique:products,slug,'.$product->id,
                new SlugRule(),
            ],
            'code'             => 'required|string|max:400|unique:products,code,'.$product->id,
            'size'             => 'nullable|string|max:400',
            'count'            => 'nullable|integer|min:0',
            'price'            => 'required|numeric|min:0',
            'discount'         => 'nullable|numeric|min:0',
            'description'      => 'nullable',
            'meta_title'       => 'nullable|string|max:400',
            'meta_description' => 'nullable|string|max:400',
            'keywords'         => 'nullable|string|max:400',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5148',
            'image_alt'        => 'nullable|string|max:400',
            'image_title'      => 'nullable|string|max:400',
        ], [
            // پیام‌های فارسی
            'category_id.required' => 'انتخاب دسته‌بندی الزامی است.',
            'category_id.exists'   => 'دسته‌بندی انتخاب شده معتبر نیست.',

            'name.required' => 'وارد کردن نام محصول الزامی است.',
            'name.max'       => 'طول نام محصول نباید بیشتر از ۴۰۰ کاراکتر باشد.',

            'slug.required' => 'وارد کردن اسلاگ الزامی است.',
            'slug.max'       => 'طول اسلاگ نباید بیشتر از ۴۰۰ کاراکتر باشد.',
            'slug.unique'    => 'این اسلاگ قبلاً استفاده شده است.',
            'image.image' => 'فایل انتخابی باید تصویر باشد',
            'image.mimes' => 'فرمت تصویر باید jpeg، png، jpg یا webp باشد',
            'image.max' => 'حجم تصویر نباید بیشتر از 5 مگابایت باشد',
            'code.required' => 'وارد کردن کد محصول الزامی است.',
            'code.max'       => 'طول کد محصول نباید بیشتر از ۴۰۰ کاراکتر باشد.',
            'code.unique'    => 'این کد محصول قبلاً ثبت شده است.',

            'size.max' => 'طول مقدار سایز نباید بیشتر از ۴۰۰ کاراکتر باشد.',

            'count.required' => 'وارد کردن تعداد موجودی الزامی است.',
            'count.integer'  => 'مقدار موجودی باید عدد صحیح باشد.',
            'count.min'      => 'مقدار موجودی نمی‌تواند منفی باشد.',

            'price.required' => 'وارد کردن قیمت الزامی است.',
            'price.numeric'  => 'قیمت باید یک مقدار عددی باشد.',
            'price.min'      => 'قیمت نمی‌تواند منفی باشد.',

            'discount.numeric' => 'تخفیف باید یک مقدار عددی باشد.',
            'discount.min'     => 'تخفیف نمی‌تواند منفی باشد.',



            'meta_title.max'         => 'طول meta title نباید بیشتر از ۴۰۰ کاراکتر باشد.',
            'meta_description.max'   => 'طول meta description نباید بیشتر از ۴۰۰ کاراکتر باشد.',
            'keywords.max'           => 'طول کلمات کلیدی نباید بیشتر از ۴۰۰ کاراکتر باشد.',

            'image_alt.max'          => 'طول متن جایگزین تصویر نباید بیشتر از ۴۰۰ کاراکتر باشد.',
            'image_title.max'        => 'طول عنوان تصویر نباید بیشتر از ۴۰۰ کاراکتر باشد.',
        ]);
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            if ($product->image) {
                Storage::disk('public')->delete('product/' . $product->image);
            }
            $ext = $file->getClientOriginalExtension();
            $filename =  $data['code']. "." . $ext;
            $file->storeAs('product', $filename, 'public');
            $data['image'] = $filename;
        } else {

            unset($data['image']);
        }
        $product->update($data);
        return back()->with('success',' محصول با موفقیت ویرایش شد.');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return back()->with('success',' محصول با موفقیت حذف شد.');
    }
    public function excelCreate()
    {
        return view('admin.product.create-excel');
    }

    public function excelImport(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|extensions:xlsx,xls,csv|max:10240'
        ]);

        $file = $request->file('excel_file');
        $extension = $file->getClientOriginalExtension();

        try {
            if ($extension === 'csv') {
                $data = $this->parseCsv($file->getRealPath());
            } else {
                $data = $this->parseExcel($file->getRealPath());
            }

            $skipErrors = $request->has('skip_errors');
            $results = $this->processProducts($data, $skipErrors);

            if ($results['errors'] && !$skipErrors) {
                return back()->withErrors($results['errors']);
            }

            $message = "تعداد {$results['created']} محصول جدید ایجاد و {$results['updated']} محصول به‌روزرسانی شد.";
            if ($results['failed'] > 0) {
                $message .= " تعداد {$results['failed']} محصول با خطا مواجه شد.";
            }

            return back()->with('success', $message);

        } catch (\Exception $e) {
            return back()->withErrors(['خطا در پردازش فایل: ' . $e->getMessage()]);
        }
    }


    private function parseCsv($filePath)
    {
        $data = [];
        $handle = fopen($filePath, 'r');

        // Read first line and remove BOM if exists
        $header = fgets($handle);
        $header = str_replace("\xEF\xBB\xBF", '', $header); // Remove UTF-8 BOM
        $header = str_getcsv($header);

        // Clean header names
        $header = array_map('trim', $header);

        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) === count($header)) {
                $data[] = array_combine($header, array_map('trim', $row));
            }
        }

        fclose($handle);
        return $data;
    }


    private function parseExcel($filePath)
    {
        $zip = new \ZipArchive();
        if ($zip->open($filePath) !== true) {
            throw new \Exception('نمی‌توان فایل اکسل را باز کرد');
        }

        $sheetData = $zip->getFromName('xl/worksheets/sheet1.xml');
        $sharedStrings = $zip->getFromName('xl/sharedStrings.xml');
        $zip->close();

        if (!$sheetData) {
            throw new \Exception('فایل اکسل معتبر نیست');
        }

        // Parse shared strings
        $strings = [];
        if ($sharedStrings) {
            $xml = simplexml_load_string($sharedStrings);
            foreach ($xml->si as $si) {
                $strings[] = (string)$si->t;
            }
        }

        // Parse sheet data
        $xml = simplexml_load_string($sheetData);
        $rows = [];
        $header = [];

        foreach ($xml->sheetData->row as $rowIndex => $row) {
            $cells = [];
            foreach ($row->c as $cell) {
                $value = (string)$cell->v;

                // Check if it's a shared string
                if (isset($cell['t']) && (string)$cell['t'] === 's') {
                    $value = $strings[(int)$value] ?? '';
                }

                $cells[] = $value;
            }

            if ($rowIndex === 0) {
                $header = $cells;
            } else {
                if (count($cells) === count($header)) {
                    $rows[] = array_combine($header, $cells);
                }
            }
        }

        return $rows;
    }



    private function processProducts($data, $skipErrors)
    {
        $errors = [];
        $successCount = 0;
        $failedCount = 0;
        $updatedCount = 0;
        $createdCount = 0;

        foreach ($data as $index => $row) {
            $rowNumber = $index + 2;

            $validationData = [
                'name' => $row['name'] ?? null,
                'slug' => $row['slug'] ?? null,
                'code' => $row['code'] ?? null,
                'price' => $row['price'] ?? null,
                'category_slug' => $row['category_slug'] ?? null,
                'keywords' => $row['keywords'] ?? null,
                'size' => $row['size'] ?? null,
                'count' => $row['count'] ?? null,
                'discount' => $row['discount'] ?? null,
                'meta_title' => $row['meta_title'] ?? null,
                'meta_description' => $row['meta_description'] ?? null,
                'image_alt' => $row['image_alt'] ?? null,
                'image_title' => $row['image_title'] ?? null,
                'description' => $row['description'] ?? null,
                'image' => $row['image'] ?? null,
            ];

            // بررسی وجود محصول با این code
            $existingProduct = Product::where('code', $validationData['code'])->first();

            $validator = Validator::make($validationData, [
                'name' => 'required|string|max:255',
                'slug' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('products', 'slug')->ignore($existingProduct?->id)
                ],
                'code' => 'required|string|max:100',
                'price' => 'required|numeric|min:0',
                'category_slug' => 'required|string|exists:categories,slug',
                'keywords' => 'nullable|string',
                'size' => 'nullable|string|max:50',
                'count' => 'nullable|integer|min:0',
                'discount' => 'nullable|numeric|min:0|max:100',
                'meta_title' => 'nullable|string|max:300',
                'meta_description' => 'nullable|string|max:300',
                'image_alt' => 'nullable|string|max:400',
                'image_title' => 'nullable|string|max:400',
                'description' => 'nullable|string',
                'image' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                $rowErrors = "ردیف {$rowNumber}: " . implode(', ', $validator->errors()->all());
                $errors[] = $rowErrors;
                $failedCount++;
                if (!$skipErrors) break;
                continue;
            }

            $category = Category::where('slug', $validationData['category_slug'])->first();
            if (!$category) {
                $errors[] = "ردیف {$rowNumber}: دسته‌بندی با اسلاگ '{$validationData['category_slug']}' یافت نشد.";
                $failedCount++;
                if (!$skipErrors) break;
                continue;
            }

            $diskRoot = config('filesystems.disks.public.root');
            if (!empty($validationData['image']) && !file_exists($diskRoot . '/product/' . $validationData['image'])) {
                $errors[] = "ردیف {$rowNumber}: فایل تصویر '{$validationData['image']}' یافت نشد.";
                $failedCount++;
                if (!$skipErrors) break;
                continue;
            }

            try {
                $product = Product::updateOrCreate(
                    ['code' => $validationData['code']], // شرط جستجو
                    [
                        'name' => $validationData['name'],
                        'slug' => $validationData['slug'],
                        'price' => $validationData['price'],
                        'category_id' => $category->id,
                        'keywords' => $validationData['keywords'],
                        'size' => $validationData['size'],
                        'count' => $validationData['count'],
                        'discount' => $validationData['discount'],
                        'meta_title' => $validationData['meta_title'],
                        'meta_description' => $validationData['meta_description'],
                        'image_alt' => $validationData['image_alt'],
                        'image_title' => $validationData['image_title'],
                        'description' => $validationData['description'],
                        'image' => $validationData['image'],
                    ]
                );

                if ($product->wasRecentlyCreated) {
                    $createdCount++;
                } else {
                    $updatedCount++;
                }
                $successCount++;
            } catch (\Exception $e) {
                $errors[] = "ردیف {$rowNumber}: خطا در ذخیره‌سازی - " . $e->getMessage();
                $failedCount++;
                if (!$skipErrors) break;
            }
        }

        return [
            'success' => $successCount,
            'created' => $createdCount,
            'updated' => $updatedCount,
            'failed' => $failedCount,
            'errors' => $errors,
        ];
    }



    public function excelTemplate()
    {
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="product-template.csv"',
        ];

        $columns = [
            'name',
            'slug',
            'code',
            'price',
            'category_slug',
            'keywords',
            'size',
            'count',
            'discount',
            'meta_title',
            'meta_description',
            'image_alt',
            'image_title',
            'description',
            'image'  // ← اضافه شد
        ];

        $callback = function() use ($columns) {
            $file = fopen('php://output', 'w');
            fwrite($file, "\xEF\xBB\xBF"); // UTF-8 BOM
            fputcsv($file, $columns);

            // نمونه داده
            fputcsv($file, [
                'محصول نمونه',
                'product-sample',
                'P001',
                '150000',
                'category-slug',
                'کلمه1,کلمه2',
                'Large',
                '10',
                '5',
                'عنوان متا',
                'توضیحات متا',
                'alt text',
                'title text',
                'توضیحات محصول',
                'product1.jpg'  // ← نمونه
            ]);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

}
