<?php
//dd($productsFeature);
?>
<footer>
    <a class="top" href="#top"><i class="fas fa-arrow-up"></i></a>
    <div class="grid wide">
        <div class="row">
            <div class="col col-lg-4 col-md-6 col-12">
                <div class="footer__item p-32">
                    <ul>
                        <li class="mb-8 pb-8"><a href="">Trang chủ</a></li>
                        <li class="mb-8 pb-8"><a href="">Sản phẩm</a></li>
                        <li class="mb-8 pb-8"><a href="">Liên hệ</a></li>
                        <li class="mb-8 pb-8"><a href="">Giao hàng</a></li>
                    </ul>
                </div>
            </div>
            <div class="col col-lg-5 col-md-6 col-12">
                <div class="footer__item p-32 pararaph-straight">
                    <h3 class="mb-8">Thông tin</h3>
                    <p>@if($infoShop){{$infoShop->short_description}}@endif</p>
                    <p>Open: @if($infoShop){{$infoShop->open_at}}@endif</p>
                    <hr>
                    <p>Địa chỉ: @if($infoShop){{$infoShop->address}}@endif</p>
                    <p>Điện thoại: @if($infoShop){{$infoShop->phone}}@endif</p>
                    <p>Zalo: @if($infoShop){{$infoShop->zalo}}@endif</p>
                </div>

            </div>
            <div class="col col-lg-3 col-md-12 col-12">
                <div class="footer__item p-32 grid">
                    <div class="row">

                        @if(! is_null($productsFeature) && sizeof($productsFeature) > 6)
                        @for($i = 0; $i < 6; $i++)
                        <div class="col-lg-4 col-md-2 col-4">
                            <a href="" class="m-2">
                                <img src="{{$productsFeature[$i]->image}}" alt="{{$productsFeature[$i]->name}}">
                            </a>
                        </div>
                        @endfor
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer__social p-4">
                                <i class="fab fa-facebook-square"></i>
                                @if($infoShop){{$infoShop->social}}@endif
                            </div>
                            <div class="footer__social p-4">
                                <i class="fas fa-envelope"></i>
                                @if($infoShop){{$infoShop->email_contact}}@endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>

<script src="/js/main.js"></script>
