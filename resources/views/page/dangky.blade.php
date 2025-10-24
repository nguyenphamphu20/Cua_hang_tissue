@extends("layouts.master")
@section("content")
<div class="bg-light border-bottom mb-4"> {{-- Thay thế .inner-header bằng Bootstrap Utility classes --}}
    <div class="container py-3"> {{-- Thay đổi padding để khớp với tiêu đề --}}
        <div class="row align-items-center">
            <div class="col-auto"> {{-- Thay thế .pull-left --}}
                <h6 class="mb-0">Đăng ký thành viên</h6>
            </div>
            <div class="col text-end"> {{-- Thay thế .pull-right và dùng text-end để căn phải --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent p-0 m-0"> {{-- Class cho Breadcrumb của B5
                        --}}
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Đăng kí</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container my-5"> {{-- Thêm margin cho container --}}
    <div id="content">
        <form action="{{route('dangky')}}" method="post" class="needs-validation" novalidate> {{-- Loại bỏ class cũ và
            thêm validation mặc định của B5 --}}

            @csrf
            <div class="row justify-content-center"> {{-- Dùng justify-content-center để căn giữa hàng --}}

                <div class="col-md-6 col-lg-5"> {{-- Dùng col-md-6 để chiếm 6 cột trên màn hình trung bình, loại bỏ
                    .col-sm-3 rỗng --}}
                    <h4 class="mb-4 text-center">Nhập thông tin thành viên</h4> {{-- Thêm margin dưới và căn giữa tiêu
                    đề --}}

                    @if(Session::has("thongbao"))
                    <div class="alert alert-success" role="alert"> {{-- Dùng alert cho thông báo --}}
                        <h5 class="mb-0">{{Session::get("thongbao")}}</h5>
                    </div>
                    @endif

                    <div class="mb-3"> {{-- Thay thế .form-block và .space20 bằng mb-3 --}}
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" value="{{ old('email') }}" required>

                        @error("email")
                        <div class="invalid-feedback">{{$message}}</div> {{-- Dùng class .invalid-feedback của B5 --}}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Họ Và Tên <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name') }}" required>

                        @error("name")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mật Khẩu <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" id="password" required>

                        @error("password")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-4"> {{-- Thêm mb-4 để tạo khoảng cách với nút Đăng Ký --}}
                        <label for="repassword" class="form-label">Nhập lại mật khẩu <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('repassword') is-invalid @enderror"
                            name="repassword" id="repassword" required>

                        @error("repassword")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="d-grid"> {{-- Dùng d-grid để làm nút chiếm toàn bộ chiều rộng --}}
                        <button type="submit" class="btn btn-primary btn-lg">Đăng Ký</button> {{-- Dùng btn-lg cho nút
                        lớn hơn --}}
                    </div>
                </div>

            </div>
        </form>
    </div>
</div> @endsection