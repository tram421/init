<?php
//dd($productsFeature);
?>
<!--limit là 4-->
@foreach($productsFeature as $feature)
    <div class="col col-lg-3 col-md-3 col-6">
        <div class="product__content">
            <a href="">
                <img src="{{$feature->image}}" alt="{{$feature->name}}">
            </a>
            <div class="product__description">
                @if($feature->price > 0)<div class="cost">{{$feature->price}}đ</div>@endif
                @if($feature->price_sale > 0)<div class="sale">{{$feature->price_sale}}đ</div>@endif
                <div class="price p-horizontal-16 p-vertical-8">{{$feature->min_range}}đ - {{$feature->max_range}}đ</div>
                <div class="name">{{$feature->name}}</div>
            </div>
            <button class="btn btn--warning jsView-detail">Xem Chi tiết</button>
        </div>
    </div>
@endforeach

