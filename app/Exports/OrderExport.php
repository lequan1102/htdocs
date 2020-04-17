<?php

namespace App\Exports;
use Auth;
use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class OrderExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('excel.excel-order-id', [
            'excel' => Order::orderBy('id', 'DESC')->where('customer_id', Auth::guard('customer')->user()->id)->get()
        ]);
    }
}
