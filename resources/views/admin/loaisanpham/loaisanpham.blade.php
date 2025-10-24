@extends("admin/layout")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Loại Sản Phẩm

            <small>Cập Nhật Thông Tin</small>
        </h1>
    </div>

    <!-- /.col-lg-12 -->

    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{route('edittype', $type->id)}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <label>Tên Loại</label>
                <input class="form-control" name="name" value="{{$type->name}}" />
                @error("name")
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Mô tả loại bánh</label>
                <textarea class="form-control" rows="5" cols="50" name="description">{{$type-

>description}}</textarea>

                @error("description")
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Hình Loại Sản Phẩm</label>
                <div>
                    <img src="resources/image/product/{{$type->image}}" width="150" />
                    <input type="hidden" name="fileold" value="{{$type->image}}" />
                </div>
                <input type="file" class="form-control" name="image" />
                @error("image")
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
    </div>
</div>
@endsection