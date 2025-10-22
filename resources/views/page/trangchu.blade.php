@extends("layouts.master")
@section("content")
<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-indicators">
                                @foreach ($slide as $sl)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="{{ $loop->index }}" class="@if($loop->first) active @endif"
                                    aria-current="@if($loop->first) true @endif"
                                    aria-label="Slide {{ $loop->iteration }}"></button>
                                @endforeach
                            </div>

                            <div class="carousel-inner">
                                @foreach ($slide as $sl)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    {{-- Hình ảnh slide. Sử dụng class 'd-block w-100' để hiển thị ảnh đầy đủ chiều
                                    rộng. --}}
                                    <img src="source/image/slide/{{$sl->image}}" class="d-block w-100"
                                        alt="Slide {{ $loop->iteration }}">

                                    {{-- Bạn có thể thêm Caption nếu cần --}}
                                    {{-- <div class="carousel-caption d-none d-md-block">
                                        <h5>Tiêu đề Slide</h5>
                                        <p>{{ $sl->description }}</p>
                                    </div> --}}
                                </div>
                                @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>v
                    </ul>
                </div>
            </div>

            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!--slider-->
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{$new_product -> total()}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($new_product as $new )
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if ($new -> promotion_price != 0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Giảm giá</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="product.html"><img height="250"
                                                src="source/image/product/{{$new->image}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$new -> name}}</p>
                                        <p class="single-item-price">
                                            @if ($new -> promotion_price === 0)
                                            <span class="flash-sale">{{number_format($new -> unit_price)}} VNĐ</span>
                                            @else
                                            <span class="flash-del">{{number_format($new -> unit_price)}} VNĐ</span>
                                            <span class="flash-sale">{{number_format($new -> promotion_price)}}
                                                VNĐ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption mt-3 mb-3">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Chi tiết<i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">{{ $new_product->links() }}</div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyến mãi</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{ $pro_product -> total()}} Kết quả</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach ($pro_product as $pro )
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if ($pro -> promotion_price != 0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="product.html"><img height="250"
                                                src="source/image/product/{{$pro -> image}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$pro -> name}}</p>
                                        <p class="single-item-price">
                                            @if ($pro->promotion_price === 0)
                                            <span class="flash-sale">{{number_format($pro -> unit_price)}} VNĐ</span>
                                            @else
                                            <span class="flash-del">{{number_format($pro -> unit_price)}} VNĐ</span>
                                            <span class="flash-sale">{{number_format($pro -> promotion_price)}}
                                                đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption mt-3 mb-3">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Chi tiết<i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="d-flex justify-content-center">{{ $new_product->links() }}</div>
                        </div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->

@endsection