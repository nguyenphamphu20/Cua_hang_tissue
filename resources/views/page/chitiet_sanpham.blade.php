@extends("layouts.master")
@section("content")
<div class="inner-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="inner-title mb-0">Product</h6>
            </div>
            <div>
                <div class="beta-breadcrumb font-large">
                    <a href="index.html">Home</a> / <span>Product</span>
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
                        <img src="assets/dest/images/products/6.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-8 mb-4">
                        <div class="single-item-body">
                            <p class="single-item-title fs-4 fw-bold">Sample Woman Top</p>
                            <p class="single-item-price">
                                <span class="fs-5">$34.55</span>
                            </p>
                        </div>

                        <div class="mb-3"></div>

                        <div class="single-item-desc">
                            <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id
                                quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor
                                repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
                                saepe.</p>
                        </div>
                        <div class="mb-3"></div>

                        <p class="fw-bold">Options:</p>
                        <div class="single-item-options d-flex align-items-center flex-wrap gap-2">
                            <select class="wc-select form-select w-auto" name="size">
                                <option>Size</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <select class="wc-select form-select w-auto" name="color">
                                <option>Color</option>
                                <option value="Red">Red</option>
                                <option value="Green">Green</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                            </select>
                            <select class="wc-select form-select w-auto" name="color">
                                <option>Qty</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart btn btn-primary" href="#"><i class="fa fa-shopping-cart me-1"></i> Add
                                to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="mt-4"></div>

                <div class="woocommerce-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#tab-description" type="button" role="tab"
                                aria-controls="tab-description" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#tab-reviews"
                                type="button" role="tab" aria-controls="tab-reviews" aria-selected="false">Reviews
                                (0)</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active p-3 border border-top-0" id="tab-description"
                            role="tabpanel" aria-labelledby="description-tab">
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
                            <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum
                                exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
                                consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil
                                molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p>
                        </div>
                        <div class="tab-pane fade p-3 border border-top-0" id="tab-reviews" role="tabpanel"
                            aria-labelledby="reviews-tab">
                            <p>No Reviews</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5"></div>

                <div class="beta-products-list">
                    <h4>Related Products</h4>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="single-item">
                                <div class="single-item-header">
                                    <a href="product.html"><img src="assets/dest/images/products/4.jpg" alt=""
                                            class="img-fluid"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">Sample Woman Top</p>
                                    <p class="single-item-price">
                                        <span>$34.55</span>
                                    </p>
                                </div>
                                <div class="single-item-caption d-flex justify-content-between align-items-center">
                                    <a class="add-to-cart" href="product.html"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="product.html">Details <i
                                            class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="single-item">
                                <div class="single-item-header">
                                    <a href="product.html"><img src="assets/dest/images/products/5.jpg" alt=""
                                            class="img-fluid"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">Sample Woman Top</p>
                                    <p class="single-item-price">
                                        <span>$34.55</span>
                                    </p>
                                </div>
                                <div class="single-item-caption d-flex justify-content-between align-items-center">
                                    <a class="add-to-cart" href="product.html"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="product.html">Details <i
                                            class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="single-item">
                                <div class="ribbon-wrapper">
                                    <div class="ribbon sale">Sale</div>
                                </div>

                                <div class="single-item-header">
                                    <a href="#"><img src="assets/dest/images/products/6.jpg" alt=""
                                            class="img-fluid"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">Sample Woman Top</p>
                                    <p class="single-item-price">
                                        <span class="flash-del text-decoration-line-through me-2">$34.55</span>
                                        <span class="flash-sale text-danger fw-bold">$33.55</span>
                                    </p>
                                </div>
                                <div class="single-item-caption d-flex justify-content-between align-items-center">
                                    <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 aside">

                <div class="widget mb-5">
                    <h3 class="widget-title pb-2 border-bottom mb-3">Best Sellers</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="d-flex mb-3">
                                <a class="flex-shrink-0 me-3" href="product.html" style="width: 65px;">
                                    <img src="assets/dest/images/products/sales/1.png" alt="" class="img-fluid">
                                </a>
                                <div class="flex-grow-1">
                                    Sample Woman Top
                                    <span class="beta-sales-price d-block fw-bold">$34.55</span>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <a class="flex-shrink-0 me-3" href="product.html" style="width: 65px;">
                                    <img src="assets/dest/images/products/sales/2.png" alt="" class="img-fluid">
                                </a>
                                <div class="flex-grow-1">
                                    Sample Woman Top
                                    <span class="beta-sales-price d-block fw-bold">$34.55</span>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <a class="flex-shrink-0 me-3" href="product.html" style="width: 65px;">
                                    <img src="assets/dest/images/products/sales/3.png" alt="" class="img-fluid">
                                </a>
                                <div class="flex-grow-1">
                                    Sample Woman Top
                                    <span class="beta-sales-price d-block fw-bold">$34.55</span>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <a class="flex-shrink-0 me-3" href="product.html" style="width: 65px;">
                                    <img src="assets/dest/images/products/sales/4.png" alt="" class="img-fluid">
                                </a>
                                <div class="flex-grow-1">
                                    Sample Woman Top
                                    <span class="beta-sales-price d-block fw-bold">$34.55</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget">
                    <h3 class="widget-title pb-2 border-bottom mb-3">New Products</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="d-flex mb-3">
                                <a class="flex-shrink-0 me-3" href="product.html" style="width: 65px;">
                                    <img src="assets/dest/images/products/sales/1.png" alt="" class="img-fluid">
                                </a>
                                <div class="flex-grow-1">
                                    Sample Woman Top
                                    <span class="beta-sales-price d-block fw-bold">$34.55</span>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <a class="flex-shrink-0 me-3" href="product.html" style="width: 65px;">
                                    <img src="assets/dest/images/products/sales/2.png" alt="" class="img-fluid">
                                </a>
                                <div class="flex-grow-1">
                                    Sample Woman Top
                                    <span class="beta-sales-price d-block fw-bold">$34.55</span>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <a class="flex-shrink-0 me-3" href="product.html" style="width: 65px;">
                                    <img src="assets/dest/images/products/sales/3.png" alt="" class="img-fluid">
                                </a>
                                <div class="flex-grow-1">
                                    Sample Woman Top
                                    <span class="beta-sales-price d-block fw-bold">$34.55</span>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <a class="flex-shrink-0 me-3" href="product.html" style="width: 65px;">
                                    <img src="assets/dest/images/products/sales/4.png" alt="" class="img-fluid">
                                </a>
                                <div class="flex-grow-1">
                                    Sample Woman Top
                                    <span class="beta-sales-price d-block fw-bold">$34.55</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection