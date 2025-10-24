@extends("admin.layout")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Loại Sản Phẩm
            <small>Thêm Mới</small>
        </h1>
    </div>

    <!-- /.col-lg-12 -->

    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{route('addtype')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên Loại</label>
                <input class="form-control" name="name" />
                @error("name")
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Mô tả loại bánh</label>
                <textarea class="form-control" rows="5" cols="50" name="description"></textarea>
                @error("description")
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Hình Loại Sản Phẩm</label>
                <input type="file" class="form-control" name="image" />
                @error("image")
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Lưu Trữ</button>
        </form>
    </div>
</div>
@endsection