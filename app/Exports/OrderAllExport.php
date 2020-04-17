<?php

namespace App\Exports;

use Auth;
use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class OrderAllExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('excel.excel-order-all', [
            'excel' => Order::where('id', 'DESC')->get()
        ]);
    }
}

