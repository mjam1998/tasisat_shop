<div>
    {{-- جستجو --}}
    <div class="row mb-3 g-2">
        <div class="col-8 ">
            <input type="text"
                   wire:model.defer="searchInput"
                   wire:keydown.enter="applySearch"
                   class="form-control"
                   placeholder="جستجو بر اساس کد سفارش یا موبایل یا نام سفارش دهنده...">
        </div>
        <div class="col-4 ">
            <button wire:click="applySearch" class="btn btn-primary w-100">
                جستجو
            </button>
        </div>

    </div>

    {{-- جدول --}}
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>

                <th class="text-center">کد</th>
                <th class="text-center">مبلغ(تومان)</th>
                <th class="text-center">وضعیت</th>
                <th class="text-center">عملیات</th>
            </tr>
            </thead>

            <tbody>
            @forelse($orders as $order)
                <tr>


                    <td class="text-center">{{ $order->code }}</td>
                    <td class="text-center">{{number_format($order->pay_amount)  }}</td>
                    <td class="text-center">
    <span class="badge bg-{{ $order->status->color() }}">
        {{ $order->status->label() }}
    </span>
                    </td>
                  <td>
                      <a href="#" class="btn btn-primary ">جزئیات</a>
                  </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        سفارشی یافت نشد
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- صفحه‌بندی --}}
    <div class="mt-3">
        {{ $orders->links() }}
    </div>
</div>

