<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use App\Models\SubProduct;
use App\Rules\SlugRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\IOFactory;

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
        $product->load('subProducts');
        return view('admin.product.edit', compact('product','categories'));
    }

//    public function update(Request $request, Product $product)
//{
//    $data = $request->validate([
//        'category_id'      => 'required|exists:categories,id',
//        'name'             => 'required|string|max:400',
//        'slug' => [
//            'required',
//            'string',
//            'max:400',
//            'unique:products,slug,'.$product->id,
//            new SlugRule(),
//        ],
//        'code'             => 'required|string|max:400|unique:products,code,'.$product->id,
//        'size'             => 'nullable|string|max:400',
//        'count'            => 'nullable|integer|min:0',
//        'price'            => 'required|numeric|min:0',
//        'discount'         => 'nullable|numeric|min:0',
//        'description'      => 'nullable',
//        'meta_title'       => 'nullable|string|max:400',
//        'meta_description' => 'nullable|string|max:400',
//        'keywords'         => 'nullable|string|max:400',
//        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5148',
//        'image_alt'        => 'nullable|string|max:400',
//        'image_title'      => 'nullable|string|max:400',
//    ], [
//        // پیام‌های فارسی
//        'category_id.required' => 'انتخاب دسته‌بندی الزامی است.',
//        'category_id.exists'   => 'دسته‌بندی انتخاب شده معتبر نیست.',
//
//        'name.required' => 'وارد کردن نام محصول الزامی است.',
//        'name.max'       => 'طول نام محصول نباید بیشتر از ۴۰۰ کاراکتر باشد.',
//
//        'slug.required' => 'وارد کردن اسلاگ الزامی است.',
//        'slug.max'       => 'طول اسلاگ نباید بیشتر از ۴۰۰ کاراکتر باشد.',
//        'slug.unique'    => 'این اسلاگ قبلاً استفاده شده است.',
//        'image.image' => 'فایل انتخابی باید تصویر باشد',
//        'image.mimes' => 'فرمت تصویر باید jpeg، png، jpg یا webp باشد',
//        'image.max' => 'حجم تصویر نباید بیشتر از 5 مگابایت باشد',
//        'code.required' => 'وارد کردن کد محصول الزامی است.',
//        'code.max'       => 'طول کد محصول نباید بیشتر از ۴۰۰ کاراکتر باشد.',
//        'code.unique'    => 'این کد محصول قبلاً ثبت شده است.',
//
//        'size.max' => 'طول مقدار سایز نباید بیشتر از ۴۰۰ کاراکتر باشد.',
//
//        'count.required' => 'وارد کردن تعداد موجودی الزامی است.',
//        'count.integer'  => 'مقدار موجودی باید عدد صحیح باشد.',
//        'count.min'      => 'مقدار موجودی نمی‌تواند منفی باشد.',
//
//        'price.required' => 'وارد کردن قیمت الزامی است.',
//        'price.numeric'  => 'قیمت باید یک مقدار عددی باشد.',
//        'price.min'      => 'قیمت نمی‌تواند منفی باشد.',
//
//        'discount.numeric' => 'تخفیف باید یک مقدار عددی باشد.',
//        'discount.min'     => 'تخفیف نمی‌تواند منفی باشد.',
//
//
//
//        'meta_title.max'         => 'طول meta title نباید بیشتر از ۴۰۰ کاراکتر باشد.',
//        'meta_description.max'   => 'طول meta description نباید بیشتر از ۴۰۰ کاراکتر باشد.',
//        'keywords.max'           => 'طول کلمات کلیدی نباید بیشتر از ۴۰۰ کاراکتر باشد.',
//
//        'image_alt.max'          => 'طول متن جایگزین تصویر نباید بیشتر از ۴۰۰ کاراکتر باشد.',
//        'image_title.max'        => 'طول عنوان تصویر نباید بیشتر از ۴۰۰ کاراکتر باشد.',
//    ]);
//    if ($request->hasFile("image")) {
//        $file = $request->file("image");
//        if ($product->image) {
//            Storage::disk('public')->delete('product/' . $product->image);
//        }
//        $ext = $file->getClientOriginalExtension();
//        $filename =  $data['code']. "." . $ext;
//        $file->storeAs('product', $filename, 'public');
//        $data['image'] = $filename;
//    } else {
//
//        unset($data['image']);
//    }
//    $product->update($data);
//    return back()->with('success',' محصول با موفقیت ویرایش شد.');
//}
    public function update(Request $request, Product $product)
    {
        $hasSubProducts = $product->subProducts()->exists();

        $rules = [
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
            'description'      => 'nullable',
            'meta_title'       => 'nullable|string|max:400',
            'meta_description' => 'nullable|string|max:400',
            'keywords'         => 'nullable|string|max:400',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5148',
            'image_alt'        => 'nullable|string|max:400',
            'image_title'      => 'nullable|string|max:400',
        ];

        // ✅ اگر SubProduct نداشت → قیمت و موجودی اجباری
        if (!$hasSubProducts) {
            $rules['price']    = 'required|numeric|min:0';
            $rules['count']    = 'required|integer|min:0';
            $rules['discount'] = 'nullable|numeric|min:0';
        }

        $data = $request->validate($rules);

        // ✅ اگر SubProduct داشت → قیمت و موجودی را حذف کن
        if ($hasSubProducts) {
            unset($data['price']);
            unset($data['count']);
            unset($data['discount']);
        }

        // ✅ مدیریت تصویر
        if ($request->hasFile("image")) {

            if ($product->image) {
                Storage::disk('public')->delete('product/' . $product->image);
            }

            $file = $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $filename = $data['code'].".".$ext;

            $file->storeAs('product', $filename, 'public');

            $data['image'] = $filename;
        }

        $product->update($data);

        return back()->with('success','محصول با موفقیت ویرایش شد.');
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

//    public function excelImport(Request $request)
//    {
//        $request->validate([
//            'excel_file' => 'required|file|extensions:xlsx,xls,csv|max:10240'
//        ]);
//
//        $file = $request->file('excel_file');
//        $extension = $file->getClientOriginalExtension();
//
//        try {
//            if ($extension === 'csv') {
//                $data = $this->parseCsv($file->getRealPath());
//            } else {
//                $data = $this->parseExcel($file->getRealPath());
//            }
//
//            $skipErrors = $request->has('skip_errors');
//            $results = $this->processProducts($data, $skipErrors);
//
//            if ($results['errors'] && !$skipErrors) {
//                return back()->withErrors($results['errors']);
//            }
//
//            $message = "تعداد {$results['created']} محصول جدید ایجاد و {$results['updated']} محصول به‌روزرسانی شد.";
//            if ($results['failed'] > 0) {
//                $message .= " تعداد {$results['failed']} محصول با خطا مواجه شد.";
//            }
//
//            return back()->with('success', $message);
//
//        } catch (\Exception $e) {
//            return back()->withErrors(['خطا در پردازش فایل: ' . $e->getMessage()]);
//        }
//    }
    public function excelImport(Request $request)
    {
        if (!$request->hasFile('excel_file')) {
            return back()->withErrors('فایلی آپلود نشده است.');
        }

        $file = $request->file('excel_file');

        if (!in_array($file->getClientOriginalExtension(), ['xlsx', 'xls'])) {
            return back()->withErrors('فرمت فایل باید اکسل باشد.');
        }

        $skipErrors = $request->has('skip_errors');

        try {

            $spreadsheet = IOFactory::load($file->getPathname());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray(null, true, true, true);

            if (count($rows) < 2) {
                return back()->withErrors('فایل خالی است.');
            }

            // حذف هدر
            unset($rows[1]);

            $products = [];

            foreach ($rows as $row) {

                $products[] = [
                    'name' => trim($row['A'] ?? ''),
                    'slug' => trim($row['B'] ?? ''),
                    'code' => trim($row['C'] ?? ''),
                    'price' => trim($row['D'] ?? ''),
                    'category_slug' => trim($row['E'] ?? ''),
                    'keywords' => trim($row['F'] ?? ''),
                    'size' => trim($row['G'] ?? ''),
                    'count' => trim($row['H'] ?? ''),
                    'discount' => trim($row['I'] ?? ''),
                    'meta_title' => trim($row['J'] ?? ''),
                    'meta_description' => trim($row['K'] ?? ''),
                    'image_alt' => trim($row['L'] ?? ''),
                    'image_title' => trim($row['M'] ?? ''),
                    'description' => trim($row['N'] ?? ''),
                    'image' => trim($row['O'] ?? ''),
                ];
            }

            DB::beginTransaction();

            $result = $this->processProducts($products, $skipErrors);

            if (!$skipErrors && $result['failed'] > 0) {
                DB::rollBack();
                return back()->withErrors($result['errors']);
            }

            DB::commit();

            return back()->with([
                'success' => "عملیات با موفقیت انجام شد.",
                'import_result' => $result
            ]);

        } catch (\Exception $e) {

            DB::rollBack();
            return back()->withErrors('خطا در ایمپورت: ' . $e->getMessage());
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


//    public function excelTemplate()
//    {
//        $headers = [
//            'Content-Type' => 'text/csv; charset=UTF-8',
//            'Content-Disposition' => 'attachment; filename="product-template.csv"',
//        ];
//
//        $columns = [
//            'name',
//            'slug',
//            'code',
//            'price',
//            'category_slug',
//            'keywords',
//            'size',
//            'count',
//            'discount',
//            'meta_title',
//            'meta_description',
//            'image_alt',
//            'image_title',
//            'description',
//            'image'  // ← اضافه شد
//        ];
//
//        $callback = function() use ($columns) {
//            $file = fopen('php://output', 'w');
//            fwrite($file, "\xEF\xBB\xBF"); // UTF-8 BOM
//            fputcsv($file, $columns);
//
//            // نمونه داده
//            fputcsv($file, [
//                'محصول نمونه',
//                'product-sample',
//                'P001',
//                '150000',
//                'category-slug',
//                'کلمه1,کلمه2',
//                'Large',
//                '10',
//                '5',
//                'عنوان متا',
//                'توضیحات متا',
//                'alt text',
//                'title text',
//                'توضیحات محصول',
//                'product1.jpg'  // ← نمونه
//            ]);
//
//            fclose($file);
//        };
//
//        return response()->stream($callback, 200, $headers);
//    }
    public function excelTemplate()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'نام محصول',
            'اسلاگ',
            'کد محصول',
            'قیمت',
            'اسلاگ دسته‌بندی',
            'کلمات کلیدی',
            'سایز',
            'موجودی',
            'درصد تخفیف',
            'متا تایتل',
            'متا توضیحات',
            'alt تصویر',
            'title تصویر',
            'توضیحات',
            'نام فایل تصویر'
        ];

        $sheet->fromArray($headers, null, 'A1');

        // نمونه داده
        $sheet->fromArray([
            'گوشی موبایل سامسونگ',
            'samsung-phone',
            'P1001',
            '15000000',
            'mobile',
            'گوشی,سامسونگ',
            '128GB',
            '10',
            '5',
            'خرید گوشی سامسونگ',
            'بهترین گوشی سامسونگ',
            'تصویر گوشی',
            'Samsung Phone',
            'توضیحات کامل محصول',
            'samsung.jpg'
        ], null, 'A2');

        // استایل هدر
        $sheet->getStyle('A1:O1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '2196F3'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        foreach (range('A', 'O') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $fileName = 'product_template.xlsx';
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
    public function excelCreateSubProduct(){
        return view('admin.product.create-sub-excel');
    }


    public function importSubProducts()
    {
        if (!isset($_FILES['file'])) {

            return back()->withErrors('فایلی آپلود نشده است.');
        }

        $file = $_FILES['file'];
        $allowedExtensions = ['xlsx', 'xls'];
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            return back()->withErrors('فقط فایل‌های Excel مجاز هستند.');
        }

        try {
            $spreadsheet = IOFactory::load($file['tmp_name']);
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray(null, true, true, true);

            // حذف header
            array_shift($data);

            $products = [];
            foreach ($data as $row) {
                // فیلتر ردیف‌های خالی
                if (empty(trim($row['A']))) {
                    continue;
                }

                $products[] = [
                    'code' => trim($row['A']),
                    'name' => trim($row['B']),
                    'slug' => trim($row['C']),
                    'category_slug' => trim($row['D']),
                    'description' => trim($row['E']),
                    'meta_title' => trim($row['F']),
                    'meta_description' => trim($row['G']),
                    'keywords' => trim($row['H']),
                    'image' => trim($row['I']),
                    'image_alt' => trim($row['J']),
                    'image_title' => trim($row['K']),
                    'sub_product_name' => trim($row['L']),
                    'sub_product_price' => trim($row['M']),
                    'sub_product_discount' => trim($row['N'])
                ];
            }

            // ادامه لاجیک import...
            $this->processSubProducts($products);

            return back()->with('success', 'محصولات با موفقیت وارد شدند.');

        } catch (\Exception $e) {
            return back()->withErrors('خطا در خواندن فایل: ' . $e->getMessage());
        }
    }


    private function processSubProducts($data)
    {
        $errors = [];
        $failedCount = 0;
        $productsCreated = 0;
        $productsUpdated = 0;
        $subproductsCreated = 0;
        $subproductsUpdated = 0;

        // پاس اول: پر کردن code های خالی
        $currentCode = null;
        foreach ($data as $index => &$row) {
            $code = trim($row['code'] ?? '');

            if (empty($code)) {
                if ($currentCode === null) {
                    $errors[] = "ردیف " . ($index + 2) . ": ردیف اول نمی‌تواند بدون code باشد";
                    $failedCount++;
                    continue;
                }
                $row['code'] = $currentCode;
            } else {
                $currentCode = $code;
            }
        }
        unset($row);

        // پاس دوم: گروه‌بندی بر اساس code
        $groupedData = [];
        foreach ($data as $index => $row) {
            $code = trim($row['code'] ?? '');
            if (empty($code)) continue;

            $groupedData[$code][] = ['row' => $row, 'index' => $index];
        }

        foreach ($groupedData as $code => $rows) {
            $firstRow = $rows[0]['row'];
            $firstRowNumber = $rows[0]['index'] + 2;

            // اعتبارسنجی ردیف اول (محصول اصلی)
            $productData = [
                'code' => $code,
                'name' => $firstRow['name'] ?? null,
                'slug' => $firstRow['slug'] ?? null,  // ← اضافه شد
                'category_slug' => $firstRow['category_slug'] ?? null,
                'description' => $firstRow['description'] ?? null,
                'meta_title' => $firstRow['meta_title'] ?? null,
                'meta_description' => $firstRow['meta_description'] ?? null,
                'keywords' => $firstRow['keywords'] ?? null,
                'image' => $firstRow['image'] ?? null,
                'image_alt' => $firstRow['image_alt'] ?? null,
                'image_title' => $firstRow['image_title'] ?? null,
            ];

            $existingProduct = Product::where('code', $code)->first();

            $validator = Validator::make($productData, [
                'code' => 'required|string|max:100',
                'name' => 'required|string|max:255',
                'slug' => [  // ← اضافه شد
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('products', 'slug')->ignore($existingProduct?->id)
                ],
                'category_slug' => 'required|string|exists:categories,slug',
                'description' => 'nullable|string',
                'meta_title' => 'nullable|string|max:300',
                'meta_description' => 'nullable|string|max:300',
                'keywords' => 'nullable|string',
                'image' => 'nullable|string',
                'image_alt' => 'nullable|string|max:400',
                'image_title' => 'nullable|string|max:400',
            ]);

            if ($validator->fails()) {
                $errors[] = "ردیف {$firstRowNumber} (محصول {$code}): " . implode(', ', $validator->errors()->all());
                $failedCount += count($rows);
                continue;
            }

            $category = Category::where('slug', $productData['category_slug'])->first();
            if (!$category) {
                $errors[] = "ردیف {$firstRowNumber}: دسته‌بندی با اسلاگ '{$productData['category_slug']}' یافت نشد";
                $failedCount += count($rows);
                continue;
            }

            $diskRoot = config('filesystems.disks.public.root');
            if (!empty($productData['image']) && !file_exists($diskRoot . '/product/' . $productData['image'])) {
                $errors[] = "ردیف {$firstRowNumber}: فایل تصویر '{$productData['image']}' یافت نشد";
                $failedCount += count($rows);
                continue;
            }

            try {
                $product = Product::updateOrCreate(
                    ['code' => $code],
                    [
                        'name' => $productData['name'],
                        'slug' => $productData['slug'],  // ← اضافه شد
                        'category_id' => $category->id,
                        'price' => null,
                        'has_sub_product' => true,
                        'description' => $productData['description'],
                        'meta_title' => $productData['meta_title'],
                        'meta_description' => $productData['meta_description'],
                        'keywords' => $productData['keywords'],
                        'image' => $productData['image'],
                        'image_alt' => $productData['image_alt'],
                        'image_title' => $productData['image_title'],
                    ]
                );

                if ($product->wasRecentlyCreated) {
                    $productsCreated++;
                } else {
                    $productsUpdated++;
                }

                // پردازش تمام زیرمحصولات
                foreach ($rows as $rowData) {
                    $row = $rowData['row'];
                    $rowNumber = $rowData['index'] + 2;

                    $subProductData = [
                        'sub_product_name' => $row['sub_product_name'] ?? null,
                        'sub_product_price' => $row['sub_product_price'] ?? null,
                        'sub_product_discount' => $row['sub_product_discount'] ?? 0,
                    ];

                    $subValidator = Validator::make($subProductData, [
                        'sub_product_name' => 'required|string|max:255',
                        'sub_product_price' => 'required|numeric|min:0',
                        'sub_product_discount' => 'nullable|numeric|min:0|max:100',
                    ]);

                    if ($subValidator->fails()) {
                        $errors[] = "ردیف {$rowNumber} (زیرمحصول): " . implode(', ', $subValidator->errors()->all());
                        $failedCount++;
                        continue;
                    }

                    $subProduct = SubProduct::updateOrCreate(
                        [
                            'product_id' => $product->id,
                            'name' => $subProductData['sub_product_name']
                        ],
                        [
                            'price' => $subProductData['sub_product_price'],
                            'discount' => $subProductData['sub_product_discount'] ?? 0,
                        ]
                    );

                    if ($subProduct->wasRecentlyCreated) {
                        $subproductsCreated++;
                    } else {
                        $subproductsUpdated++;
                    }
                }

            } catch (\Exception $e) {
                $errors[] = "ردیف {$firstRowNumber} (محصول {$code}): خطا در ذخیره‌سازی - " . $e->getMessage();
                $failedCount += count($rows);
            }
        }

        return [
            'products_created' => $productsCreated,
            'products_updated' => $productsUpdated,
            'subproducts_created' => $subproductsCreated,
            'subproducts_updated' => $subproductsUpdated,
            'failed' => $failedCount,
            'errors' => $errors,
        ];
    }


    public function downloadSubProductTemplate()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // تنظیم راست‌چین برای فارسی
        $sheet->getStyle('A1:N1000')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        // Header
        $headers = [
            'code' => 'کد محصول',
            'name' => 'نام محصول',
            'slug' => 'نامک (slug)',
            'category_slug' => 'نامک دسته‌بندی',
            'description' => 'توضیحات',
            'meta_title' => 'عنوان متا',
            'meta_description' => 'توضیحات متا',
            'keywords' => 'کلمات کلیدی',
            'image' => 'تصویر',
            'image_alt' => 'متن جایگزین تصویر',
            'image_title' => 'عنوان تصویر',
            'sub_product_name' => 'نام زیرمحصول',
            'sub_product_price' => 'قیمت زیرمحصول',
            'sub_product_discount' => 'تخفیف زیرمحصول '
        ];

        $col = 'A';
        foreach ($headers as $key => $label) {
            $sheet->setCellValue($col . '1', $label);
            $sheet->getColumnDimension($col)->setWidth(20);
            $col++;
        }

        // استایل header
        $sheet->getStyle('A1:N1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4472C4']
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER
            ]
        ]);

        // ردیف نمونه 1
        $sheet->setCellValue('A2', 'PROD14');
        $sheet->setCellValue('B2', 'گوشی سامسونگ');
        $sheet->setCellValue('C2', 'samsung-phone');
        $sheet->setCellValue('D2', 'mobile');
        $sheet->setCellValue('E2', 'توضیحات محصول');
        $sheet->setCellValue('I2', 'image.jpg');
        $sheet->setCellValue('L2', 'رم 128GB');
        $sheet->setCellValue('M2', '15000000');
        $sheet->setCellValue('N2', '1000');

        // ردیف نمونه 2 (زیرمحصول دوم همان محصول)
        $sheet->setCellValue('A3', 'PROD14');
        $sheet->setCellValue('L3', 'رم 256GB');
        $sheet->setCellValue('M3', '18000000');
        $sheet->setCellValue('N3', '500');

        // ردیف نمونه 3 (محصول جدید)
        $sheet->setCellValue('A4', 'PROD15');
        $sheet->setCellValue('B4', 'لپ‌تاپ ایسوس');
        $sheet->setCellValue('C4', 'asus-laptop');
        $sheet->setCellValue('D4', 'laptop');
        $sheet->setCellValue('L4', 'Core i5');
        $sheet->setCellValue('M4', '25000000');
        $sheet->setCellValue('N4', '0');

        // تنظیم ارتفاع ردیف اول
        $sheet->getRowDimension(1)->setRowHeight(25);

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="sub-product-template.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function destroySubProduct(SubProduct $subproduct)
    {
        $subproduct->delete();

        return back()->with('success','زیرمحصول حذف شد.');
    }
    public function editSubProduct(SubProduct $subproduct)
    {
        return view('admin.product.sub-product', compact('subproduct'));
    }
    public function updateSubProduct(Request $request, SubProduct $subproduct)
    {
        $data = $request->validate([
            'size'     => 'required|string|max:400',
            'code'     => 'required|string|max:400|unique:sub_products,code,'.$subproduct->id,
            'count'    => 'required|integer|min:0',
            'price'    => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
        ], [
            'size.required'  => 'وارد کردن سایز الزامی است.',
            'code.required'  => 'وارد کردن کد الزامی است.',
            'code.unique'    => 'این کد قبلاً ثبت شده است.',
            'count.required' => 'وارد کردن موجودی الزامی است.',
            'price.required' => 'وارد کردن قیمت الزامی است.',
        ]);

        $subproduct->update($data);

        // ✅ اگر خواستی قیمت محصول اصلی آپدیت شود
        $product = $subproduct->product;

        $product->update([
            'price' => $product->subProducts()->min('price'),
            'count' => $product->subProducts()->sum('count'),
        ]);

        return redirect()
            ->route('admin.product.edit', $product->id)
            ->with('success','زیرمحصول با موفقیت ویرایش شد.');
    }
}
