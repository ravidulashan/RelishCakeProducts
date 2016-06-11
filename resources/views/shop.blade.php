<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 5/28/2016
 * Time: 9:26 AM
 */
?>
@extends('layouts.master')
@section('title','Online menu')
@section('menu_active','active')
@section('body')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">

                        <h2>Category</h2>

                        <div class="panel-group category-products wow fadeInDown" id="accordian">
                            <!--category-productsr-->

                            @foreach($category as $cat)
                                <div class="panel panel-default">
                                    <div class="panel-heading active">
                                        <h4 class="panel-title "><a
                                                    href="/onlinemenu/{{$cat->type}}">{{$cat->type}}</a></h4>
                                    </div>
                                </div>
                            @endforeach


                        </div><!--/category-productsr-->
                        <div class="wow fadeInDown" data-wow-duration="1000ms"
                             data-wow-delay="600ms">

                            <div><!--price-range  class="price-range "-->
                                <h2>Price Range</h2>

                                <div class="well ">
                                    <!--     <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                                data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>-->

                                    <input type="text" class="range-slider" value="500">
                                    <b>Rs. 0</b> <b class="wow fadeindown pull-right">Rs. 4000</b>

                                </div>
                            </div><!--/price-range-->
                        </div>

                    </div>
                </div>

                <div class="col-sm-9 padding-right wow fadeInDown">
                    <div class="features_items" id="masterdiv"><!--features_items-->
                        <h2 class="title text-center">Featured Cakes</h2>

                        @if(sizeof($newcakes)<1 )
                            @foreach($cakes as $cake)
                                <div class="col-sm-4 " id="test">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::asset($cake->img_url)}}" alt=""/>

                                                <h2>{{$cake->name}}</h2>

                                                <p>{{$cake->type}}</p>
                                                <a href="/onlinemenu/{{$cake->type}}/{{$cake->cake_id}}"
                                                   class="btn btn-default add-to-cart"><i
                                                            class="fa fa-list-alt"></i>Details and Pricing</a>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2>{{$cake->name}}</h2>

                                                    <p>{{$cake->type}}</p>
                                                    <a href="/onlinemenu/{{$cake->type}}/{{$cake->cake_id}}"
                                                       class="btn btn-default add-to-cart"><i
                                                                class="fa fa-list-alt"></i>Details and Pricing</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @else

                            @foreach($newcakes as $newcake)
                                <div class="col-sm-4 wow fadeindown">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::asset($newcake->img_url)}}" alt=""/>

                                                <h2>{{$newcake->name}}</h2>

                                                <p>{{$newcake->type}}</p>
                                                <a href="/onlinemenu/{{$newcake->type}}/{{$newcake->cake_id}}"
                                                   class="btn btn-default add-to-cart"><i
                                                            class="fa fa-list-alt"></i>Details and Pricing</a>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2>{{$newcake->name}}</h2>

                                                    <p>{{$newcake->type}}</p>
                                                    <a href="/onlinemenu/{{$newcake->type}}/{{$newcake->cake_id}}"
                                                       class="btn btn-default add-to-cart"><i
                                                                class="fa fa-list-alt"></i>Details and Pricing</a>
                                                </div>
                                            </div>
                                            <img src="images/home/new.png" class="new" alt=""/>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                            @if(sizeof($newcakes)<9 )
                                <?php $counter = 9 - sizeof($newcakes) ?>
                                @if(sizeof($cakes)<$counter)
                                    @foreach($cakes as $cake)
                                        <div class="col-sm-4 ">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="{{URL::asset($cake->img_url)}}" alt=""/>

                                                        <h2>{{$cake->name}}</h2>

                                                        <p>{{$cake->type}}</p>
                                                        <a href="/onlinemenu/{{$cake->type}}/{{$cake->cake_id}}"
                                                           class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-list-alt"></i>Details and
                                                            Pricing</a>
                                                    </div>
                                                    <div class="product-overlay">
                                                        <div class="overlay-content">
                                                            <h2>{{$cake->name}}</h2>

                                                            <p>{{$cake->type}}</p>
                                                            <a href="/onlinemenu/{{$cake->type}}/{{$cake->cake_id}}"
                                                               class="btn btn-default add-to-cart"><i
                                                                        class="fa fa-list-alt"></i>Details and
                                                                Pricing</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    @for($i=0;$i<$counter;++$i)

                                        <div class="col-sm-4 ">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="{{URL::asset($cakes[$i]->img_url)}}" alt=""/>

                                                        <h2>{{$cakes[$i]->name}}</h2>

                                                        <p>{{$cakes[$i]->type}}</p>
                                                        <a href="/onlinemenu/{{$cake->type}}/{{$cake->cake_id}}"
                                                           class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-list-alt"></i>Details and
                                                            Pricing</a>
                                                    </div>
                                                    <div class="product-overlay">
                                                        <div class="overlay-content">
                                                            <h2>{{$cakes[$i]->name}}</h2>

                                                            <p>{{$cakes[$i]->type}}</p>
                                                            <a href="/onlinemenu/{{$cake->type}}/{{$cake->cake_id}}"
                                                               class="btn btn-default add-to-cart"><i
                                                                        class="fa fa-list-alt"></i>Details and
                                                                Pricing</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    @endfor
                                @endif
                            @endif
                        @endif

                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>


@endsection
@section('scripts')

    <script>

        function setPriceRange(low, high) {
            $.ajax({
                type: "GET",
                url: "/onlinecake/pricerange",
                async: true,
                cache: false,
                data: {LowValue: low, HighValue: high},
                timeout: 50000,
                success: function (data) {
                    alert(data);
                    $('#masterdiv').html('');
                    $('#masterdiv').append('<h2 class="title text-center">Featured Cakes</h2>');

                    for (var key in data) {
                    $('#masterdiv').append(

                            ' <div class="col-sm-4 ">' +
                            ' <div class="product-image-wrapper">' +
                            ' <div class="single-products">' +
                            ' <div class="productinfo text-center">' +
                            ' <img src="'+data[key].img_url+'" alt=""/>' +
                            '<h2>'+ data[key].name +'</h2>' +
                            '<p>'+data[key].type+' </p>' +
                            ' <a href=\"/onlinemenu/'+data[key].type+'/'+data[key].cake_id+'\"'+
                            'class="btn btn-default add-to-cart"><i' +
                            ' class="fa fa-list-alt"></i>Details and Pricing</a>' +
                            '</div>' +
                            '<div class="product-overlay">' +
                            '<div class="overlay-content">' +
                            ' <h2>'+ data[key].name+'</h2>' +
                            '<p>'+data[key].type+'</p>' +
                             ' <a href=\"/onlinemenu/'+data[key].type+'/'+data[key].cake_id+'\"'+
                            'class="btn btn-default add-to-cart"><i' +
                            'class="fa fa-list-alt"></i>Details and Pricing</a>' +
                            '</div>' +
                            '</div>' +



                            '</div>' +
                            '</div>' +
                            '</div>'


                    ) ;
                    }

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
//                    setTimeout(waitForMsg, 15000);
                }
            });
        }
        // $('.features_items').hide();
        $(function () {
            $('.range-slider').jRange({
                from: 0,
                to: 4000,
                step: 50,

                format: '%s',
                width: 200,
                showLabels: true,
                isRange: true
            });

        });
    </script>
@endsection