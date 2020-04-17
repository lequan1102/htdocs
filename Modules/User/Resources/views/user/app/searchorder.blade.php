@extends('layouts.app')

@section('content')
    <div class="col col-md-9 col-12" style="margin-bottom: 30px">
        <div class="card">
            <div class="card-header">Tìm kiếm đơn hàng</div>
            <div class="card-body">
                {{-- <form action="" method="POST">
                    <div class="form-group">
                        <label for="code_order">Mã đơn hàng</label>
                        <input type="text" name="key_search" class="form-control" id="code_order" placeholder="Nhập mã đơn hàng cần tìm kiếm">
                        <small id="emailHelp" class="form-text text-muted">Bạn có thể tìm kiếm mã đơn hàng ở trên để có kết quả chính xác nhất</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </form> --}}
                <table>
                    <thead>
                        <th>STT</th>
                        <th>Tên đơn hàng</th>
                        <th>Mã đơn hàng</th>
                        <th>Cân nặng</th>
                        <th>Số tiền</th>
                        <th>Trạng thái</th>
                        <th>Ngày bắt đầu</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection