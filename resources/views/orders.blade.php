<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 5/29/2016
 * Time: 12:24 PM
 */
?>
@extends('layouts.master')
@section('title','Orders')
@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Orders</h2>


                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @if($currentcategory=='onlineorders')
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background-color:#FC9A11">
                                        <h4 class="panel-title"><a
                                                    href="/orders/onlineorders">Online Orders</a></h4>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a
                                                    href="/orders/cakerequestorders">Cake Request Orders</a></h4>
                                    </div>
                                </div>
                            @else
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a
                                                    href="/orders/onlineorders">Online Orders</a></h4>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background-color:#FC9A11;">
                                        <h4 class="panel-title"><a
                                                    href="/orders/cakerequestorders">Cake Request Orders</a></h4>
                                    </div>
                                </div>
                            @endif


                        </div><!--/category-products-->


                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        @if($carts==null)
                            @foreach($cakerequests as $cakerequest)
                                <div class="col-sm-5 col-md-4">
                                    <div class="view-product">
                                        <img src="{{URL::asset($cakerequest->img_url)}}" alt=""/>

                                    </div>

                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->

                                        <div class="col-sm-10 ">
                                            <h4>personal information</h4>
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td>Name :</td>
                                                    <td>{{($cakerequest->user->first_name).' '.$cakerequest->user->last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Number :</td>
                                                    <td>{{$cakerequest->user->tel_no}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email :</td>
                                                    <td>{{$cakerequest->user->email}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-10 ">
                                            <h4>Cake information</h4>
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td>Cake type :</td>
                                                    <td>{{$cakerequest->requestQuantity->type}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Served Amount :</td>
                                                    <td>{{$cakerequest->requestQuantity->served_amount}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Required Date :</strong></td>
                                                    <td><strong>{{$cakerequest->req_date}}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Requested Date :</td>
                                                    <td>{{$cakerequest->request_date}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <form method="POST" action="/respondorder">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$cakerequest->request_id}}" name="requestid">
                                            <input type="hidden" value="{{$currentcategory}}" name="category">
                                            <button type="submit" id="declinebtn" name="declinebtn" value="declinebtn"
                                                    class="btn btn-default cart">

                                                Decline
                                            </button>
                                            <button type="submit" id="acceptbtnbtn" name="acceptbtn" value="acceptbtn"
                                                    class="btn btn-default cart">

                                                Accept
                                            </button>

                                        </form>


                                        <div style="position: relative;margin-top: 40px">
                                            <?php
                                            $paginator = $cakerequests;
                                            $link_limit = 2;
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


                                    </div><!--/product-information-->
                                </div>
                            @endforeach
                        @else
                            <div class="product-information"><!--/product-information-->
                                @foreach($carts as $cart)
                                    @foreach($cart->cartItem as $cartitem)
                                        <?php  $cakedesc = \App\CakeDesc::with('cake')->where('cake_desc_id', '=', $cartitem->cake_desc_id)->get();?>
                                            <div class="col-sm-10 ">
                                                <h4>personal information</h4>
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td>Name :</td>
                                                        <td>{{($cart->user->first_name).' '.$cart->user->last_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Number :</td>
                                                        <td>{{$cart->user->tel_no}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email :</td>
                                                        <td>{{$cart->user->email}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                    @endforeach
                                @endforeach
                            </div><!--/product-information-->
                        @endif


                    </div><!--/product-details-->


                </div>
            </div>

        </div>
    </section>
@endsection
@section('scripts')
    <script>


    </script>

@endsection
