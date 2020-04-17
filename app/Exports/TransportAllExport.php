<?php

namespace App\Exports;

use Auth;
use App\Transport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class TransportAllExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('excel.excel-transport-all', [
            'excel' => Transport::where('id', 'DESC')->get()
        ]);
    }
}

