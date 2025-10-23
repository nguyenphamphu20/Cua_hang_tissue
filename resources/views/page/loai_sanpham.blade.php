@extends("layouts.master")
@section("content")
<div class="inner-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="inner-title mb-0">Loại {{$loai -> name}}</h6>
            </div>
            <div>
                <div class="beta-breadcrumb font-large">
                    <a href="index">Trang chủ</a> / <span>{{$loai -> name}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div id="content">
        <div class="main-content">
            <div class="row">
                <div class="col-md-3">
                    <ul class="aside-menu list-unstyled">
                        @foreach ($danhsach_loai as $dsl )

                        @endforeach
                        <li><a href="loai-san-pham/{{$dsl -> id}}">{{$dsl -> name}}</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="beta-products-list">
                        <h4>Danh sách thuộc loại {{$loai -> name}}</h4>
                        <div class="beta-products-details d-flex justify-content-between mb-3">
                            <p class="mb-0">Tìm thấy {{count($sanpham_theoloai)}} sản phẩm</p>
                        </div>

                        <div class="row">
                            @foreach ( $sanpham_theoloai as $sptl )
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="single-item">
                                    @if ($sptl -> promotion !== 0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Giảm giá</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsanpham',$sptl->id)}}"><img height="250"
                                                src="source/image/product/{{$sptl -> image}}" alt=""
                                                class="img-fluid"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$sptl -> name}}</p>
                                        <p class="single-item-price">
                                            @if ($sptl -> promotion === 0)
                                            <span class="flash-sale">{{number_format($sptl -> unit_price)}} đồng</span>
                                            @else
                                            <span class="flash-del">{{number_format($sptl -> unit_price)}}</span>
                                            <span class="flash-sale">{{number_format($sptl -> promotion_price)}}
                                                đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption d-flex justify-content-between align-items-center">
                                        <a class="add-to-cart" href="shopping_cart.html"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsanpham',$sptl->id)}}">Chi
                                            tiết<i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-5"></div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khác</h4>
                        <div class="beta-products-details d-flex justify-content-between mb-3">
                            <p class="mb-0">Tìm thấy {{$sanpham_khac -> total()}} sản phẩm</p>
                        </div>
                        <div class="row">
                            @foreach ($sanpham_khac as $spk )
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="single-item">
                                    @if ($spk -> promotion !== 0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Giảm giá</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsanpham',$spk->id)}}"><img height="250"
                                                src="source/image/product/{{$spk -> image}}" alt=""
                                                class="img-fluid"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$spk -> name}}</p>
                                        <p class="single-item-price">
                                            @if ($spk -> promotion === 0)
                                            <span class="flash-sale">{{number_format($spk -> unit_price)}} đồng</span>
                                            @else
                                            <span class="flash-del">{{number_format($spk -> unit_price)}}</span>
                                            <span class="flash-sale">{{number_format($spk -> promotion_price)}}
                                                đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption d-flex justify-content-between align-items-center">
                                        <a class="add-to-cart" href="shopping_cart.html"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsanpham',$spk->id)}}">Chi
                                            tiết<i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="d-flex justify-content-center">{{ $sanpham_khac->links() }}</div>
                        </div>
                        <div class="mb-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection