<table>
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên đơn hàng</th>
        <th>Hình ảnh đơn hàng</th>
        <th>Mã đơn hàng</th>
        <th>Cân nặng</th>
        <th>Số tiền</th>
        <th>Trạng thái</th>
        <th>Ghi chú</th>
        <th>Link đơn hàng</th>
        <th>Số lượng</th>
        <th>Loại vận chuyển</th>
        <th>Đóng hộp</th>
        <th>Ngày đặt hàng</th>
        <th>Địa chỉ</th>
        <th>Tên khách hàng</th>
    </tr>
    </thead>
    <tbody>
    @foreach($excel as $item)
        <tr>
            <th>{{ $loop->index+1 }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->image }}</td>
            <td>{{ $item->code }}</td>
            <td>{{ $item->kg }}</td>
            <td>{{ $item->money }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->note }}</td>
            <td>{{ $item->link }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->transport }}</td>
            <td>{{ $item->box }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->location }}</td>
            <td>{{ $item->customer_name }}</td>
{{--            <td>{{ ($user->type == 0) ? 'Sinh viên' : 'Admin' }}</td>--}}
        </tr>
    @endforeach
    </tbody>
</table>
