@extends("admin/layout")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản Lý Đơn Đặt Hàng
            <small>Danh Sách</small>
        </h1>
    </div>
    @if(Session("thongbao"))
    <div class="text-danger">{{Session::get("thongbao")}}</div>
    @endif
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tên Khách Hàng</th>
                <th>Số điện thoại</th>
                <th>Ngày Đặt Hàng</th>
                <th>Tổng Tiền</th>
                <th>Hình Thức Thanh Toán</th>
                <th>Mô Tả</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dsdonhang as $dh)
            <tr class="odd gradeX" align="center">
                <td>{{$dh->id}}</td>

                <td>{{$dh->customer->name}}</td>
                <td>{{$dh->customer->phone_number}}</td>
                <td>{{\Carbon\Carbon::parse($dh->date_order)->format('d/m/Y')}}</td>
                <td>{{number_format($dh->total)}} đồng</td>
                <td>{{$dh->payment=="COD"?"Tiền Mặt":"Chuyển khoản"}}</td>
                <td>{{$dh->note}}</td>
                <td>{{$dh->status==1?"Đã giao hàng":"Chờ xử lý"}}</td>
                @if($dh->status==0)
                <td class="center">

                    <a href="{{route('billdetail', $dh->id)}}" class="btn btn-info"><i class="fa fa-eye"></i> Chi
                        Tiết</a>
                    <a href="{{route('updatebill',$dh->id)}}" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i>
                        Cập Nhật</a>

                    <a href="{{route('deletebill',$dh->id)}}" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i>
                        Xoá</a>

                </td>
                @else
                <td class="center"><a href="{{route('billdetail', $dh->id)}}" class="btn btn-info"><i
                            class="fa fa-eye"></i> Chi Tiết</a></td>

                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection