@extends("admin.layout")
@section("content")
<h2>Chi Tiết Đơn Đặt Hàng</h2>
<h3 class="text-danger">{{$bill->status==1?"Đơn Hàng này đã giao hàng":"Đơn hàng này đang chờ xử
    lý..."}}</h3>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <h4 class="bg-primary p-2" style="padding:7px; border-radius:10px">Thông Tin Khách Hàng</h4>
        <table class="table">
            <tr>
                <th>Tên Khách Hàng:</th>
                <td>{{ $bill->customer->name }}</td>
            </tr>
            <tr>
                <th>Địa Chỉ:</th>
                <td>{{ $bill->customer->address }}</td>
            </tr>
            <tr>
                <th>Số Điện Thoại:</th>
                <td>{{ $bill->customer->phone_number }}</td>
            </tr>

        </table>
    </div>
    <div class="col-md-4">
        <h4 class="bg-primary p-2" style="padding:7px; border-radius:10px">Thông Tin Đơn Hàng</h4>
        <table class="table">
            <tr>
                <th>Mã Đơn Hàng:</th>
                <td>{{ $bill->id }}</td>
            </tr>
            <tr>
                <th>Ngày Đặt Hàng:</th>
                <td>{{ \Carbon\Carbon::parse($bill->date_order)->format('d/m/Y')}}</td>
            </tr>
            <tr>
                <th>Tổng Tiền:</th>
                <td>{{ number_format($bill->total, 2) }} VNĐ</td>
            </tr>
            <tr>
                <th>Phương Thức Thanh Toán:</th>
                <td>{{ $bill->payment=="COD"?"Tiền Mặt":"Chuyển khoản"}}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-2"></div>
</div>
<table class="table table-bordered">
    <thead>
        <tr class="table-active">
            <th>ID Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Đơn Giá</th>
            <th>Thành Tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bill->bill_detail as $detail)
        <tr>
            <td>{{ $detail->id_product }}</td>
            <td>{{ $detail->products->name }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>{{ number_format($detail->unit_price, 2) }} VNĐ</td>
            <td>{{ number_format($detail->quantity*$detail->unit_price,2)}} VNĐ</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div><a href="{{route('billindex')}}" class="btn btn-success">Trở Về</a></div>
@endsection