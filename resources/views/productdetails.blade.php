<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 5/29/2016
 * Time: 12:24 PM
 */
?>
@extends('layouts.master')
@section('title','Cake Description')
@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>


                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($categories as $category)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a
                                                    href="/onlinemenu/{{$category->type}}">{{$category->type}}</a></h4>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--/category-products-->


                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5 col-md-4">
                            <div class="view-product">
                                <img src="{{URL::asset($cake->img_url)}}" alt=""/>

                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                @if(date('Y-m-d', $cake->created_at->timestamp)<=date('Y-m-d') && date('Y-m-d', $cake->created_at->timestamp)>=date('Y-m-d', strtotime('first day of last month')))
                                    <img src="{{URL::asset('images/product-details/new.jpg')}}" class="newarrival"
                                         alt=""/>
                                @endif


                                <h2 id="cakename">{{$cake->name}}</h2>

                                <p>{{$cake->type}}</p>

                                <div class="row" style="position: relative;margin-top: 20px">

                                    <div class="col-sm-10">
                                        <p>Select size :</p>
                                        <table id="product-table" class="table">
                                            @foreach($cake->cakedesc as $cake_desc)

                                                <tr class="{{(strcasecmp($cake_desc->quantity,'Piece'))?'wanted':''}} ">
                                                    <input type="hidden" id="selectedid"
                                                           value="{{$cake_desc->cake_desc_id}}">
                                                    <td>{{$cake_desc->quantity}}</td>
                                                    <td>{{'Serves '.$cake_desc->served_amount}}</td>
                                                    <td>{{'Rs. '.$cake_desc->price}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>

                                </div>
                                <!--  <input type="submit" value="Add Second Driver" id="test" />-->
                                <div id="test" class="col-sm-8">
                                    <p>Free customized wording:</p>
                                    <input type="text" id="wording" class="form-control"/>
                                </div>

                                    <span>

                                        <label>Quantity:</label>

                                        <input type="text" step="1" min="1" id="qty" value="1"/>
                                        <button type="button" id="btn" class="btn btn-default cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                    </span>

                                <div id="msg"></div>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->


                </div>
            </div>

        </div>
    </section>
@endsection
@section('scripts')
    <script>

        $('#msg').on('click', '#cart', function () {
            window.location.href = "/cart";
        });

        $('#btn').on('click', function () {
            if ($('#qty').val().length == 0) {
                $('#msg').html('');
                $('#msg').append(
                        '<div class="alert alert-danger">' +
                        'Please enter a valid Quantity' +
                        '</div>'
                );
            } else if (!$('#selectedrow').length) {
                $('#msg').html('');
                $('#msg').append(
                        '<div class="alert alert-danger">' +
                        'PLease select a item/size' +
                        '</div>'
                );
            } else if (Math.floor($('#qty').val()) == $('#qty').val() && $.isNumeric($('#qty').val()) && parseInt($('#qty').val(), 10) > 0) {

                $('#msg').html('');
                //   var test=$('#selectedrow #selectedid').val();
                var cake_desc_id = $('#selectedrow').children('#selectedid').val();
                var qty = $('#qty').val();
                var wording = $('#wording').val();

                $.ajax({
                    type: "GET",
                    url: "/productdetails/addtocart",
                    async: true,
                    cache: false,
                    data: {CakeDescId: cake_desc_id, Quantity: qty, Wording: wording},

                    success: function (data) {

                        if (data.retvalue == 'login') {
                            window.location.href = "/login";
                        } else {

                            $(window).scrollTop($('#msg').offset().top);
                            $('#msg').append(
                                    '<div class="alert alert-success">' +
                                    '<strong>The item has been added successfully</strong>' +
                                    '<br>' +
                                    $('#cakename').text() + '(' + data.retvalue + ') &nbsp  -  &nbsp Quantity &nbsp' + qty +
                                    '<button type="button" id="cart" class="btn btn-default cart">' +
                                    '<i class="fa fa-shopping-cart"></i>' +
                                    'View cart' +
                                    '</button>' +
                                    '</div>'
                            );

                            $("#product-table tr").css("background", "#fff");
                            $("#product-table tr").attr('id', '');
                        }


                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        window.location.replace('/productdetails/addtocart/'+cake_desc_id+'/'+qty+'/'+wording);
                        //
                    }
                });

            } else {
                $('#msg').html('');
                $('#msg').append(
                        '<div class="alert alert-danger">' +
                        'PLease enter a valid Quantity' +
                        '</div>'
                );

            }
        });


    </script>

@endsection
