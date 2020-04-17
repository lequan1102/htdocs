<?php

namespace App\Exports;
use App\Transport;
use Auth;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class TransportExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('excel.excel-transport-id', [
            'excel' => Transport::orderBy('id', 'DESC')->where('customer_id', Auth::guard('customer')->user()->id)->get()
        ]);
    }
}
