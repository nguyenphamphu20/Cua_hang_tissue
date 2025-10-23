@extends("layouts.master")
@section("content")
<div class="inner-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="inner-title mb-0">{{$sanpham -> name}}</h6>
            </div>
            <div>
                <div class="beta-breadcrumb font-large">
                    <a href="index.html">Trang chủ</a> / <span>{{$sanpham -> name}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-4">
    <div id="content">
        <div class="row">
            <div class="col-lg-9">

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <img src="source/image/product/{{$sanpham -> image}}" alt="Hình ảnh sản phẩm" class="img-fluid">
                    </div>
                    <div class="col-md-8 mb-4">
                        <div class="single-item-body">
                            <p class="single-item-title fs-4 fw-bold">{{$sanpham -> name}}</p>
                            <p class="single-item-price">
                                @if ($sanpham -> promotion === 0)
                                <span class="flash-sale">{{number_format($sanpham -> unit_price)}}</span>
                                @else
                                <span class="flash-del">{{number_format($sanpham -> unit_price)}}</span>
                                <span class="flash-sale">{{number_format($sanpham -> promotion_price)}}</span>
                                @endif
                            </p>
                        </div>

                        <div class="mb-3"></div>

                        <div class="single-item-desc">
                            <p>{{$sanpham -> description}}</p>
                        </div>
                        <div class="mb-3"></div>

                        <p class="fw-bold">Đơn vị tính</p>
                        <div class="single-item-options d-flex align-items-center flex-wrap gap-2">
                            <select class="wc-select form-select w-auto" name="size">
                                <option>Chọn đơn vị tính</option>
                                <option value="hộp" {{$sanpham -> unit === "hộp" ?"selected" : ""}}>Hộp</option>
                                <option value="hộp" {{$sanpham -> unit === "cái" ?"selected" : ""}}>Cái</option>
                            </select>
                            <a class="add-to-cart btn btn-primary" href="#"><i class="fa fa-shopping-cart me-1"></i>
                                Thêm vào giỏ
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-4"></div>

                <div class="woocommerce-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#tab-description" type="button" role="tab"
                                aria-controls="tab-description" aria-selected="true">Mô tả</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#tab-reviews"
                                type="button" role="tab" aria-controls="tab-reviews" aria-selected="false">Bình
                                luận</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active p-3 border border-top-0" id="tab-description"
                            role="tabpanel" aria-labelledby="description-tab">
                            <p>{{$sanpham ->description}}</p>
                        </div>
                        <div class="tab-pane fade p-3 border border-top-0" id="tab-reviews" role="tabpanel"
                            aria-labelledby="reviews-tab">
                            <p>Không có</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5"></div>

                <div class="beta-products-list">
                    <h4>Sản phẩm cùng loại</h4>
                    <div class="row">
                        @foreach($sanpham_lienquan as $splq)
                        <div class="col-sm-4">
                            <div class="single-item mt-3">
                                @if($splq->promotion_price!= 0)
                                <div class="ribbon-wrapper">
                                    <div class="ribbon sale">Sale</div>
                                </div>
                                @endif
                                <div class="single-item-header">
                                    <a href="{{route('chitietsanpham', $splq->id)}}"><img
                                            src="source/image/product/{{$splq->image}}" alt="hình sản phẩm"
                                            height="250"></a>

                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$splq->name}}</p>
                                    <p class="single-item-price" style="font-size:18px">
                                        @if($splq->promotion_price==0)
                                        <span class="flash-sale">{{number_format($splq->unit_price)}} đồng</span>
                                        @else

                                        <span class="flash-del">{{number_format($splq->unit_price)}} đồng</span>

                                        <span class="flash-sale">{{number_format($splq->promotion_price)}} đồng</span>

                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption mt-3">
                                    <a class="add-to-cart pull-left" href="product.html"><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('chitietsanpham', $splq->id)}}">Chi tiết
                                        <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>

                    <div class="d-flex justify-content-center mt-4">{{$sanpham_lienquan->links()}}</div>
                </div>
            </div>

            <div class="col-lg-3 aside">

                <div class="widget">
                    <h3 class="widget-title">Sản phẩm bán chạy</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($sanpham_banchay as $spbc)

                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('chitietsanpham',1)}}">
                                    <img src="source/image/product/{{$spbc->image}}" alt="Hình sản phẩm"></a>

                                <div class="media-body">
                                    {{$spbc->name}}
                                    <span class="beta-sales-price">
                                        @if($spbc->promotion_price==0)

                                        <span class="flash-sale">{{number_format($spbc->unit_price)}} đồng</span>

                                        @else

                                        <span class="flash-del">{{number_format($spbc->unit_price)}} đồng</span>

                                        <span class="flash-sale">{{number_format($spbc->promotion_price)}} đồng</span>

                                        @endif
                                    </span>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>

                    <div class="widget">
                        <h3 class="widget-title">Sản phẩm mới</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                @foreach($sanpham_moi as $spm)
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{route('chitietsanpham', $spm->id)}}">
                                        <img src="source/image/product/{{$spm->image}}" alt="hình sản phẩm">
                                    </a>
                                    <div class="media-body">
                                        {{$spm->name}}<br />
                                        <span class="beta-sales-price">
                                            @if($spm->promotion_price==0)
                                            <span class="flash-sale">{{number_format($spm->unit_price)}} đồng</span>
                                            @else
                                            <span class="flash-sale">{{number_format($spm->promotion_price)}}
                                                đồng</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection