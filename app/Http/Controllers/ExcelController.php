<?php

namespace App\Http\Controllers;

use Auth;
use Excel;
use Exportable;
use App\Transport;

use App\Exports\OrderExport;
use App\Exports\OrderAllExport;
use App\Exports\TransportExport;
use App\Exports\TransportAllExport;


class ExcelController extends Controller
{
    /*
     * Xuất Excel
     * ::export tất cả đơn hàng của khách hàng theo id
     * ::export tất cả đơn hàng ký gửi vận chuyển theo id
     *
     * ::export tất cả đơn hàng trong quản trị
     * ::export tất cả đơn hàng ký gửi vận chuyển trong quản trị
     */
    public function export_order_id()
    {
        return Excel::download(new OrderExport, 'excel-donhang-'.Auth::guard('customer')->user()->name.'.xlsx');
    }
    public function export_transport_id()
    {
        return Excel::download(new TransportExport, 'excel-kyguivanchuyen-'.Auth::guard('customer')->user()->name.'.xlsx');
    }
    public function export_order_all()
    {
        return Excel::download(new OrderAllExport, 'excel-donhang.xlsx');
    }
    public function export_transport_all()
    {
        return Excel::download(new TransportAllExport, 'excel-kyguivanchuyen.xlsx');
    }
}
