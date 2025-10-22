<header id="header">

    <div class="header-top bg-light border-bottom">
        <div class="container py-2">
            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div class="d-flex align-items-center me-auto">
                    <ul class="list-unstyled d-flex mb-0 small">
                        <li class="me-4"><a class="text-decoration-none text-secondary" href="#"><i
                                    class="fa fa-home me-1"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                        <li><a class="text-decoration-none text-secondary" href="#"><i class="fa fa-phone me-1"></i>
                                0163 296 7751</a></li>
                    </ul>
                </div>

                <div>
                    <ul class="list-unstyled d-flex mb-0 small">
                        <li class="ms-3"><a class="text-decoration-none text-secondary" href="#"><i
                                    class="fa fa-user me-1"></i>Tài khoản</a></li>
                        <li class="ms-3"><a class="text-decoration-none text-secondary" href="#">Đăng kí</a></li>
                        <li class="ms-3"><a class="text-decoration-none text-secondary" href="#">Đăng nhập</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header-body py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">

                <div class="flex-shrink-0">
                    <a href="index" id="logo">
                        <img src="source/assets/dest/images/logo-cake.png" width="200px" alt="Logo">
                    </a>
                </div>

                <div class="d-flex align-items-center ms-auto">

                    <div class="me-3">
                        <form class="d-flex" role="search" method="get" id="searchform" action="/">
                            <input class="form-control" type="text" value="" name="s" id="s"
                                placeholder="Nhập từ khóa..." />
                            <button class="btn btn-outline-secondary fa fa-search ms-1" type="submit"
                                id="searchsubmit"></button>
                        </form>
                    </div>

                    <div>
                        <div class="cart dropdown">
                            <div class="beta-select dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa fa-shopping-cart"></i> Giỏ hàng (Trống) <i class="fa fa-chevron-down"></i>
                            </div>

                            <div class="beta-dropdown dropdown-menu cart-body dropdown-menu-end p-3"
                                style="min-width: 300px;">

                                <div class="cart-item border-bottom mb-2 pb-2">
                                    <div class="media d-flex align-items-center">
                                        <a class="me-3 flex-shrink-0" href="#"><img
                                                src="source/assets/dest/images/products/cart/1.png" alt=""
                                                style="width: 50px;"></a>
                                        <div class="media-body flex-grow-1">
                                            <span class="cart-item-title d-block fw-bold">Sample Woman Top</span>
                                            <span class="cart-item-options d-block text-muted small">Size: XS; Colar:
                                                Navy</span>
                                            <span class="cart-item-amount d-block">1x<span
                                                    class="fw-bold text-danger">$49.50</span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="cart-caption border-top pt-2">
                                    <div class="cart-total text-end mb-2">
                                        Tổng tiền: <span class="cart-total-value fw-bold text-primary">$34.55</span>
                                    </div>
                                    <div class="d-grid">
                                        <a href="checkout.html" class="btn btn-primary text-center">
                                            Đặt hàng <i class="fa fa-chevron-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="header-bottom navbar navbar-expand-lg" style="background-color: #0277b8;">
        <div class="container">

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu"
                aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-text me-1 text-white">Menu</span>
                <i class="fa fa-bars text-white"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row">

                    <li class="nav-item me-3">
                        <a class="nav-link text-white" href="index">Trang chủ</a>
                    </li>

                    <li class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ( $loai_sanpham as $loai )
                            <li><a class="dropdown-item" href="product_type.html">{{$loai -> name}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item me-3"><a class="nav-link text-white" href="gioi-thieu">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="lien-he">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>