<?php
//dd($productsFeature);
?>
<!--limit là 4-->
@foreach($productsNew as $new)
    <div class="col col-lg-3 col-md-3 col-6 cursor-pointer">
        <div class="product__content" onclick="direct('./product-detail/{{$new->id}}')">
            <a href="./product-detail/{{$new->id}}">
                <img src="{{$new->image}}" alt="{{$new->name}}">
            </a>
            <div class="product__description">
                <div class="price">
                    @if ($new->price != 0)
                        @if($new->price > 0)<div class="cost">{{numFormatVn($new->price)}}đ</div>@endif
                        @if($new->price_sale > 0)<div class="sale">{{numFormatVn($new->price_sale)}}đ</div>@endif
                    @else <span>Giá: Phụ thuộc nhu cầu khách</span>
                    @endif
                </div>

                <div class="range-price p-horizontal-16 p-vertical-8">
                    <span>@if ($new->min_range != null)Từ: {{numFormatVn($new->min_range)}}đ Đến {{numFormatVn($new->max_range)}}đ@endif</span>
                </div>

                <div class="name">{{$new->name}}</div>

            </div>
            <button class="btn btn--warning jsView-detail">Xem Chi tiết</button>
        </div>
    </div>
@endforeach

