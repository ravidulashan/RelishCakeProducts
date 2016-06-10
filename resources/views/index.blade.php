<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 5/27/2016
 * Time: 10:42 AM
 */
?>

@extends('layouts.master')
@section('title','Welcome to Relish Cake Products')
@section('home_active','active')
@section('body')
    <section id="main-slider" class="no-margin"><!--main slider-->
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6 pull-left">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1"
                                        style="font-family: 'Open Sans', sans-serif;font-size: 45px">Every cake is a
                                        special one</h1>

                                    <h2 class="animation animated-item-2">Celebrate a birthday, wedding or a special
                                        occasion with us</h2>
                                    <!--   <a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                                </div>
                            </div>

                            <!--     <div class="col-sm-6 hidden-xs animation animated-item-4">
                                     <div class="slider-img">
                                         <img src="images/slider/img1.png" class="img-responsive">
                                     </div>
                                 </div> -->

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1" style="font-family: 'Open Sans', sans-serif;">
                                        You have tried the rest, now try the best</h1>

                                    <h2 class="animation animated-item-2">We make your dreams come true with various
                                        arts of cake</h2>
                                    <!--  <a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                                </div>
                            </div>

                            <!--  <div class="col-sm-6 hidden-xs animation animated-item-4">
                                  <div class="slider-img">
                                      <img src="images/slider/img2.png" class="img-responsive">
                                  </div>
                              </div>  -->

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1" style="font-family: 'Open Sans', sans-serif;">
                                        Cup cakes are love with icing on top</h1>

                                    <h2 class="animation animated-item-2">Enjoy delicious cup cakes with your own design
                                        on it</h2>
                                    <!--   <a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                                </div>
                            </div>
                            <!--   <div class="col-sm-6 hidden-xs animation animated-item-4">
                                   <div class="slider-img">
                                       <img src="images/slider/img3.png" class="img-responsive">
                                   </div>
                               </div> -->
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->


    <section>
        <div style="position: relative;margin-top: 20px">
            <div class="container">
                <div class="recommended_items "><!--recommended_items-->
                    <div class="wow fadeInDown" data-wow-duration="1000ms">
                        <h2 class="title text-center">Popular cakes</h2>
                    </div>

                    @if(sizeof($query)<8)
                    <div id="recommended-item-carousel" class="carousel slide " data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-3 wow bounceInDown" data-wow-duration="1000ms"
                                     data-wow-delay="400ms">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center ">
                                                <img src="{{URL::asset($cakes[0]->img_url)}}" alt=""/>

                                                <h2>{{$cakes[0]->name}}</h2>

                                                <a href="/onlinemenu/{{$cakes[0]->type}}/{{$cakes[0]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-list-alt"></i>Details and Pricing</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 wow bounceInDown" data-wow-duration="1000ms"
                                     data-wow-delay="600ms">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::asset($cakes[1]->img_url)}}" alt=""/>

                                                <h2>{{$cakes[1]->name}}</h2>

                                                <a href="/onlinemenu/{{$cakes[1]->type}}/{{$cakes[1]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-list-alt"></i>Details and Pricing</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 wow bounceInDown" data-wow-duration="1000ms"
                                     data-wow-delay="800ms">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::asset($cakes[2]->img_url)}}" alt=""/>

                                                <h2>{{$cakes[2]->name}}</h2>

                                                <a href="/onlinemenu/{{$cakes[2]->type}}/{{$cakes[2]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-list-alt"></i>Details and Pricing</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 wow bounceInDown" data-wow-duration="1000ms"
                                     data-wow-delay="1000ms">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::asset($cakes[3]->img_url)}}" alt=""/>

                                                <h2>{{$cakes[3]->name}}</h2>

                                                <a href="/onlinemenu/{{$cakes[3]->type}}/{{$cakes[3]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-list-alt"></i>Details and Pricing</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="item">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::asset($cakes[4]->img_url)}}" alt=""/>

                                                <h2>{{$cakes[4]->name}}</h2>

                                                <a href="/onlinemenu/{{$cakes[4]->type}}/{{$cakes[4]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-list-alt"></i>Details and Pricing</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::asset($cakes[5]->img_url)}}" alt=""/>

                                                <h2>{{$cakes[5]->name}}</h2>

                                                <a href="/onlinemenu/{{$cakes[5]->type}}/{{$cakes[5]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-list-alt"></i>Details and Pricing</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::asset($cakes[6]->img_url)}}" alt=""/>

                                                <h2>{{$cakes[6]->name}}</h2>

                                                <a href="/onlinemenu/{{$cakes[6]->type}}/{{$cakes[6]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-list-alt"></i>Details and Pricing</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::asset($cakes[7]->img_url)}}" alt=""/>

                                                <h2>{{$cakes[7]->name}}</h2>

                                                <a href="/onlinemenu/{{$cakes[7]->type}}/{{$cakes[7]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-list-alt"></i>Details and Pricing</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    @else
                        <div id="recommended-item-carousel" class="carousel slide " data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-3 wow bounceInDown" data-wow-duration="1000ms"
                                         data-wow-delay="400ms">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center ">
                                                    <img src="{{$query[0]->img_url}}" alt=""/>

                                                    <h2>{{$query[0]->name}}</h2>

                                                    <a href="/onlinemenu/{{$query[0]->type}}/{{$query[0]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-list-alt"></i>Details and Pricing</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 wow bounceInDown" data-wow-duration="1000ms"
                                         data-wow-delay="600ms">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{$query[1]->img_url}}" alt=""/>

                                                    <h2>{{$query[1]->name}}</h2>

                                                    <a href="/onlinemenu/{{$query[1]->type}}/{{$query[1]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-list-alt"></i>Details and Pricing</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 wow bounceInDown" data-wow-duration="1000ms"
                                         data-wow-delay="800ms">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{$query[2]->img_url}}" alt=""/>

                                                    <h2>{{$query[2]->name}}</h2>

                                                    <a href="/onlinemenu/{{$query[2]->type}}/{{$query[2]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-list-alt"></i>Details and Pricing</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 wow bounceInDown" data-wow-duration="1000ms"
                                         data-wow-delay="1000ms">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{$query[3]->img_url}}" alt=""/>

                                                    <h2>{{$query[3]->name}}</h2>

                                                    <a href="/onlinemenu/{{$query[3]->type}}/{{$query[3]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-list-alt"></i>Details and Pricing</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="item">
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{$query[4]->img_url}}" alt=""/>

                                                    <h2>{{$query[4]->name}}</h2>

                                                    <a href="/onlinemenu/{{$query[4]->type}}/{{$query[4]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-list-alt"></i>Details and Pricing</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{$query[5]->img_url}}" alt=""/>

                                                    <h2>{{$query[5]->name}}</h2>

                                                    <a href="/onlinemenu/{{$query[5]->type}}/{{$query[5]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-list-alt"></i>Details and Pricing</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{$query[6]->img_url}}" alt=""/>

                                                    <h2>{{$query[6]->name}}</h2>

                                                    <a href="/onlinemenu/{{$query[6]->type}}/{{$query[6]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-list-alt"></i>Details and Pricing</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{$query[7]->img_url}}" alt=""/>

                                                    <h2>{{$query[7]->name}}</h2>

                                                    <a href="/onlinemenu/{{$query[7]->type}}/{{$query[7]->cake_id}}" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-list-alt"></i>Details and Pricing</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                        @endif

                </div><!--/recommended_items-->


            </div>
        </div>
    </section>

@endsection