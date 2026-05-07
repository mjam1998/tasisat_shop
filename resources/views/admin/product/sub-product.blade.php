<form action="{{ route('admin.subproduct.update',$subproduct->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>سایز</label>
        <input type="text" name="size" class="form-control"
               value="{{ old('size',$subproduct->size) }}">
    </div>

    <div class="mb-3">
        <label>کد</label>
        <input type="text" name="code" class="form-control"
               value="{{ old('code',$subproduct->code) }}">
    </div>

    <div class="mb-3">
        <label>قیمت</label>
        <input type="number" name="price" class="form-control"
               value="{{ old('price',$subproduct->price) }}">
    </div>

    <div class="mb-3">
        <label>موجودی</label>
        <input type="number" name="count" class="form-control"
               value="{{ old('count',$subproduct->count) }}">
    </div>

    <button class="btn btn-primary">ذخیره</button>
</form>

