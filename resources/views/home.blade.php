<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body>
<header id="header top">
    <div class="grid wide">
        <div class="row container no-gutters">
            <div class="header__left">
                <a href="#">@if($infoShop){{$infoShop->name}}@endif</a>
            </div>
            <div class="header__right">
                <span class="material-icons-outlined">search</span>
                <a href="tel:@if($infoShop){{$infoShop->hotline}}@endif">Hotline: @if($infoShop){{$infoShop->hotline}}@endif</a>
            </div>
        </div>
    </div>
</header>
<div class="grid wide">
    <div class="row no-gutters wide nav">
        <div id="nav__mobile">
                <span class="material-icons-outlined">
                    menu
                    </span>
        </div>
        <ul class="nav__list">
            <li class="nav__item"><a href="">Trang chủ</a></li>
            <li class="nav__item"><a href="">Sản phẩm</a></li>
            @if(isset($page))
                @foreach($page as $eachPage)
                    <li class="nav__item"><a href="">{{$eachPage->name}}</a></li>
                @endforeach
            @endif
            <li class="nav__item"><a href="">Bài viết</a></li>
        </ul>
        <div class="open-at">
                    <span class="material-icons-outlined">
                        settings
                        </span>
            <span>Open: @if($infoShop){{$infoShop->open_at}}@endif</span>
        </div>


    </div>
</div>
<div id="top">
    <img src="@if($top){{$top->image}}@endif" alt="">
    <div class="grid wide">
        <div class="row">
            <div class="col col-lg-o-6 col-md-o-6 col-o-7">
                <div class="top__content">
                    <a class="btn btn--warning" href="@if($top){{$top->url_button}}@endif">@if($top){{$top->content_button}}@endif</a>
                    <h3 class="">@if($top){{$top->main_content}}@endif</h3>
                    <p class="">@if($top){{$top->mini_content}}@endif</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="category">
    <div class="grid wide no-gutters col-12">
        <ul class="category__list">
            @if(isset($category))
                @foreach($category as $eachCategory)
                    <li class="category__item">
                        <a href="">{{$eachCategory->name}}</a>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>
    <div class="category__image  col-12">
        <div class="grid wide container">
            <div class=" row">
                <div class="col col-lg-4 col-md-4 col-4">
                    <div class="category__image__item">
                        <img src="/img/img-cat-1.jpg" alt="">
                        <button class="btn btn--warning">Hình ảnh</button>
                    </div>
                </div>
                <div class="col col-lg-4 col-md-4 col-4">
                    <div class="category__image__item">
                        <img src="/img/img-cat-1.jpg" alt="">
                        <button class="btn btn--warning">Video</button>
                    </div>
                </div>
                <div class="col col-lg-4 col-md-4 col-4">
                    <div class="category__image__item">
                        <img src="/img/img-cat-1.jpg" alt="">
                        <button class="btn btn--warning">Bài viết</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="products-feature m-0 pb-8">
    <div class="grid wide pt-16">
        <h3 class="fs-20 mb-16">Sản phẩm nổi bật</h3>
        <div class="row">
            @include('products-feature')
        </div>
        <a class="all-products" href="">Tất cả sản phẩm <i class="fas fa-arrow-right"></i></a>
    </div>
</div>
<div class="products-new m-0 pb-8">
    <div class="grid wide pt-16">
        <h3 class="fs-20 mb-16">Sản phẩm Mới</h3>
        <div class="row">
            @include('products-new')
        </div>
        <a class="all-products" href="">Tất cả sản phẩm <i class="fas fa-arrow-right"></i></a>
    </div>
</div>

<div class="info pt-8">
    <div class="grid wide">
        <div class="row container">
            <div class="col col-lg-3 col-md-6 col-12 mb-8">
                <div class="info__ship bg-gray info__item p-16">
                    <h2>Hướng dẫn</h2>
                    @if($infoShop){{$infoShop->short_description}}@endif
                </div>
            </div>
            <div class="col col-lg-3 col-md-6 col-12 mb-8">
                <div class="info__help bg-gray info__item p-16">
                    <h2>Giao hàng</h2>
                    @if($infoShop){!!$infoShop->ship_info!!}@endif
                </div>
            </div>
            <div class="col col-lg-6 col-md-16 col-12 mb-8">
                <div class="info__contact bg-gray info__item p-16">
                    <h2 class="pb-8">Thông tin liên hệ</h2>
                    <div class="info__item__inner">
                        <h4 class="m-0 p-8 mr-8">Địa chỉ: </h4>
                        <p class="info__address">@if($infoShop){{$infoShop->address}}@endif</p>
                    </div>
                    <div class="info__item__inner">
                        <h4 class="m-0 p-8 mr-8">Điện thoại: </h4>
                        <p class="info__address">@if($infoShop){{$infoShop->phone}}@endif</p>
                    </div>
                    <div class="info__item__inner">
                        <h4 class="m-0 p-8 mr-8">Zalo: </h4>
                        <p class="info__address">@if($infoShop){{$infoShop->zalo}}@endif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
</body>
</html>
