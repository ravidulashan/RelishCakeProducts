<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 6/8/2016
 * Time: 12:37 PM
 */
?>
@extends('layouts.master')
@section('title','Cake Description')
@section('body')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <div id="msg"></div>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $cartitem)
                        <tr>
                            <?php  $cakedesc = \App\CakeDesc::with('cake')->where('cake_desc_id', '=', $cartitem->cake_desc_id)->get();?>
                            <td class="cart_product">
                                <a href=""><img src="{{URL::asset($cakedesc[0]['cake']['img_url'])}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$cakedesc[0]['cake']['name']}}</a></h4>
                                    <p>Quantity :{{$cakedesc[0]['quantity']}}</p>
                                @if($cartitem->wording!=null)
                                    <p>Wording :{{$cartitem->wording}}</p>
                                @endif


                            </td>
                            <td class="cart_price">
                                <p>{{'Rs. '.$cakedesc[0]['price']}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                    <input class="cart_quantity_input " type="text" id="text{{$cartitem->order_id}}"
                                           name="quantity" value="{{$cartitem->qty}}"
                                           autocomplete="off" size="2">
                                   <a class="cart_quantity_down" id="{{$cartitem->order_id}}" href="">Update</a>

                                </div>

                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price" id="tot{{$cartitem->order_id}}">{{'Rs. '.$cartitem->price}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="/cart/remove/{{$cartitem->order_id}}"><i class="fa fa-times"></i></a>
                            </td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>

                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>$59</span></li>
                            <li>Eco Tax <span>$2</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>$61</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection
@section('scripts')
    <script>
        $('.cart_quantity_down').on('click',function(e){

            e.preventDefault();
            if (Math.floor($('#text'+$(this).attr('id')).val()) == $('#text'+$(this).attr('id')).val() && $.isNumeric($('#text'+$(this).attr('id')).val()) && parseInt($('#text'+$(this).attr('id')).val(), 10) > 0) {
                $('#msg').html('');
                var id=$(this).attr('id');
                var qty=$('#text'+$(this).attr('id')).val();

                $.ajax({
                    type: "GET",
                    url: "/cart/updateqty",
                    async: true,
                    cache: false,
                    data: {ID:id, Quantity: qty},
                    timeout: 50000,
                    success: function (data) {

                        $('#tot'+id).text('Rs. '+data.tot_value);

                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        //                    setTimeout(waitForMsg, 15000);
                        alert('te');
                    }
                });
            } else {
                $('#msg').html('');

                $('#msg').append(
                        '<div class="alert alert-danger">' +
                        'Please enter a valid Quantity' +
                        '</div>'
                );
            }
        });
       /* $('.cart_quantity_input').blur(function () {

            if (Math.floor($(this).val()) == $(this).val() && $.isNumeric($(this).val()) && parseInt($(this).val(), 10) > 0) {
                alert($(this).attr('id'));
                $('#msg').html('');
                $('#textmsg'+$(this).attr('id')).text('');
            } else {
                $('#msg').html('');
                $('#textmsg'+$(this).attr('id')).text("invalid");
                $('#msg').append(
                        '<div class="alert alert-danger">' +
                        'Please enter a valid Quantity' +
                        '</div>'
                );
            }

            $('.cart_quantity_input').val(500);
        });*/
    </script>
@endsection