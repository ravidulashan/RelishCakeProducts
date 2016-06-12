<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 5/28/2016
 * Time: 9:26 AM
 */
?>
@extends('layouts.master')
@section('title',$currentcategory)
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
                                @if($cat->type==$currentcategory)
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color:#FC9A11">
                                            <h4 class="panel-title"><a
                                                        href="/cakedesign/{{$cat->type}}">{{$cat->type}}</a>
                                            </h4>
                                        </div>
                                    </div>
                                @else
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a
                                                        href="/cakedesign/{{$cat->type}}">{{$cat->type}}</a>
                                            </h4>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div><!--/category-productsr-->

                        <div class="wow fadeInDown" data-wow-duration="1000ms"
                             data-wow-delay="600ms">

                            <div><!--price-range  class="price-range "-->
                                <h2>Request Cake Design</h2>
                                <p class="lead">You can request a cake with your own design in here</p>
                            <!--    <div class="well "> -->
                                        <div style="padding-left: 40px">
                                            <a  href="/requestquote/{{$currentcategory}}"
                                                class="btn btn-default add-to-cart"><i
                                                        class="fa fa-list-alt"></i>Request for quote</a>
                                        </div>

                           <!--     </div>-->
                            </div><!--/price-range-->
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 padding-right wow fadeInDown">
                    <div class="features_items" id="masterdiv"><!--features_items-->
                        <h2 class="title text-center">{{$currentcategory}}</h2>
                        @if($success==1)
                            <div class="alert alert-success">
                                Your request for a quote has been submitted successfully. We will contact you upon evaluating the details.
                                </div>
                            @endif
                        @foreach($cakes as $cake)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::asset($cake->img_url)}}" alt=""/>

                                            <h2>{{$cake->name}}</h2>

                                            <p>{{$cake->type}}</p>
                                            <a href="/requestquote/{{$cake->type}}/{{$cake->cake_id}}"
                                               class="btn btn-default add-to-cart"><i
                                                        class="fa fa-list-alt"></i>Request for quote</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{$cake->name}}</h2>

                                                <p>{{$cake->type}}</p>
                                                <a href="/requestquote/{{$cake->type}}/{{$cake->cake_id}}"
                                                   class="btn btn-default add-to-cart"><i
                                                            class="fa fa-list-alt"></i>Request for quote</a>
                                            </div>
                                        </div>
                                        @if(date('Y-m-d', $cake->created_at->timestamp)<=date('Y-m-d') && date('Y-m-d', $cake->created_at->timestamp)>=date('Y-m-d', strtotime('first day of last month')))
                                            <img src="{{URL::asset('images/home/new.png')}}" class="new" alt=""/>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div><!--features_items-->

                    <?php
                    $paginator = $cakes;
                    $link_limit = 13;
                    ?>
                    @if ($paginator->lastPage() > 1)
                        <ul class="pagination">
                            <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                                <a href="{{ ($paginator->currentPage() == 1) ? 'javascript:void(0)': $paginator->previousPageUrl() }}"><i
                                            class="fa fa-chevron-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                                <?php
                                $half_total_links = floor($link_limit / 2);
                                $from = $paginator->currentPage() - $half_total_links;
                                $to = $paginator->currentPage() + $half_total_links;
                                if ($paginator->currentPage() < $half_total_links) {
                                    $to += $half_total_links - $paginator->currentPage();
                                }
                                if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                                    $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                                }
                                ?>
                                @if ($from < $i && $i < $to)
                                    <li class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                                        <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endif
                            @endfor
                            <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'disabled' : '' }}">
                                <a href="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'javascript:void(0)':$paginator->url($paginator->currentPage()+1) }}"><i
                                            class="fa fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </section>

@endsection
