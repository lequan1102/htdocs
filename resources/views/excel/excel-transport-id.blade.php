<table>
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên ký gửi</th>
        <th>Anh/ Chị</th>
        <th>Số điện thoại</th>
        <th>Mã đơn hàng</th>
        <th>Cân nặng</th>
        <th>Số tiền</th>
        <th>Ghi chú</th>
        <th>Vị trí</th>
        <th>Tình trạng</th>
        <th>Ngày ký gửi</th>
        <th>Tên khách hàng</th>
    </tr>
    </thead>
    <tbody>
    @foreach($excel as $item)
        <tr>
            <th>{{ $loop->index+1 }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->full_name }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->code }}</td>
            <td>{{ $item->kg }}</td>
            <td>{{ $item->money }}</td>
            <td>{{ $item->note }}</td>
            <td>{{ $item->location }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->customer_name }}</td>
            {{--            <td>{{ ($user->type == 0) ? 'Sinh viên' : 'Admin' }}</td>--}}
        </tr>
    @endforeach
    </tbody>
</table>
