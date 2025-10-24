@extends("layouts.master")
@section("content")
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('index')}}">Trang chủ</a> / <span>Đăng nhập</span>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <form action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">

            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Vui lòng nhập thông tin</h4>
                    @if(Session::has("thongbao"))
                    <div class="text-danger">{{Session::get("thongbao")}}</div>
                    @endif
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" name="email" id="email" required>
                        @error("email")
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-block">
                        <label for="password">Password*</label>
                        <input type="password" name="password" id="password" required>
                        @error("password")
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection