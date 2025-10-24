@extends("admin/layout")
@section("content")
<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Loại Bánh
                <small>Danh Sách</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr align="center">
                    <th width="100">Mã Loại</th>
                    <th width="100">Tên Loại</th>
                    <th width="500">Mô Tả</th>
                    <th>Hình</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dsloai as $lsp)
                <tr class="odd gradeX" align="center">
                    <td>{{$lsp->id}}</td>
                    <td>{{$lsp->name}}</td>
                    <td>{{$lsp->description}}</td>
                    <td><img src="source/image/product/{{$lsp->image}}" height="70" /></td>

                    <td class="center">

                        <a class="btn btn-danger" href="#"> <i class="fa fa-trash-o fa-fw"></i> Xoá</a>

                        <a class="btn btn-info" href="#"> <i class="fa fa-pencil fa-fw"></i> Sửa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">{{$dsloai->links()}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    @endsection