<?php
//dd($productsFeature);
?>
<!--limit là 4-->
@foreach($productsFeature as $feature)
    <div class="col col-lg-3 col-md-3 col-6 cursor-pointer" onclick="direct('./product-detail/{{$feature->id}}')">
        <div class="product__content">

                <a href="./product-detail/{{$feature->id}}">
                    <img src="{{$feature->image}}" alt="{{$feature->name}}">
                </a>
                <div class="product__description">
                    <div class="price">
                        @if ($feature->price != 0)
                            @if($feature->price > 0)<div class="cost">{{numFormatVn($feature->price)}}đ</div>@endif
                            @if($feature->price_sale > 0)<div class="sale">{{numFormatVn($feature->price_sale)}}đ</div>@endif
                        @else <span>Giá: Phụ thuộc nhu cầu khách</span>
                        @endif
                    </div>

                    <div class="range-price p-horizontal-16 p-vertical-8">
                        <span>@if ($feature->min_range != null)Từ: {{numFormatVn($feature->min_range)}}đ Đến {{numFormatVn($feature->max_range)}}đ@endif</span>
                    </div>

                    <div class="name">{{$feature->name}}</div>

                </div>
                <button class="btn btn--warning jsView-detail">Xem Chi tiết</button>


        </div>
    </div>
@endforeach
{{--<script>--}}
{{--    function direct()--}}
{{--    {--}}
{{--        console.log('tram')--}}
{{--    }--}}
{{--</script>--}}
