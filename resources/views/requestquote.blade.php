<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 5/29/2016
 * Time: 12:24 PM
 */
?>
@extends('layouts.master')
@section('title','Request Cake')
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
                                                    href="/cakedesign/{{$category->type}}">{{$category->type}}</a></h4>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--/category-products-->


                    </div>
                </div>
                @if($cake!=null)
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
                                    <div clas="row">
                                        <div class="col-sm-10">

                                            <h2 id="cakename">{{$cake->name}}</h2>

                                            <p>{{$cake->type}}</p>


                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                <div class="requestQuote"><!--sign up form-->
                                                    <form method="POST" id="requestQuoteform" action="#">
                                                        {{csrf_field()}}
                                                        <h2>Request Quote</h2>
                                                        <input type="hidden" value="{{$cake->img_url}}" name="img_url" id="img_url">
                                                        <select id="cake_type" name="cake_type">
                                                            <option disabled selected>Select a cake type</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->type}}">{{$category->type}}</option>
                                                            @endforeach

                                                        </select>
                                                        <select id="served_amount" name="served_amount"
                                                                style="margin-bottom: 10px">
                                                            <option disabled selected>Select serving size (Select type
                                                                of cake first)
                                                            </option>

                                                        </select>

                                                        <div class="input-append date" id="dp3"
                                                             style="display: block;margin-bottom: 5px"
                                                             data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                                            <input size="16" id="reqdate" name="reqdate" class="pull-left"
                                                                   style="width:85%;display: inline;" type="text"
                                                                   value="Required date" readonly>
                                                            <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                        </div>

                                                        <button type="submit" id="signup" class="btn btn-default">Signup
                                                        </button>
                                                    </form>
                                                </div><!--/sign up form-->
                                            @else
                                            @endif


                                        </div>
                                    </div>


                                </div><!--/product-information-->
                            </div>
                        </div><!--/product-details-->


                    </div>
                @else
                    <div class="col-sm-9 col-md-6 padding-right">
                        <div class="requestQuote"><!--sign up form-->
                            <form method="POST" id="signupForm" action="{{ url('/signup') }}"
                                  style="padding-left: 200px">
                                {{csrf_field()}}
                                <h2>Request Quote</h2>
                                <input type="text" id=firstname name="firstname"
                                       placeholder="First Name"/>
                                <input type="text" id=lastname name="lastname" placeholder="Last Name"/>

                                <div style="margin-top: 15px;margin-bottom: 5px;">
                                    <input type="radio" id="gender" name="gender" value="1"
                                           style="height:12px;display:inline;width:10%"/>Male &nbsp
                                    <input type="radio" id="gender" name="gender" value="0"
                                           style="height:12px;display:inline;width:10%;"/>Female
                                    <label style="display: block" for="gender" class="error"></label>
                                </div>

                                <p style="display:block;margin-bottom: 5px">Birthday</p>

                                <div style="display:block;margin-bottom: 10px">
                                    <select style="display:inline;width:20%;"

                                            id="months" name="days"></select>
                                    <select style="display:inline;width:20%;" id="months"
                                            name="months"></select>
                                    <select style="display:inline;width:20%;" id="months"
                                            name="years"></select>
                                    <label for="months" style="display:block;" class="error"></label>
                                </div>
                                <input type="text" id="telephone" name="telephone"
                                       placeholder="Mobile number"/>
                                <input type="email" id="email" name="email"
                                       placeholder="Email Address"/>
                                <input type="password" id="password" name="password"
                                       placeholder="Password"/>
                                <input type="password" id="confirm_password" name="confirm_password"
                                       placeholder="Confirm Password"/>
                                <button type="submit" id="signup" class="btn btn-default">Signup
                                </button>
                            </form>
                        </div><!--/sign up form-->

                    </div>
                @endif


            </div>

        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script>
        $('#dp3').datepicker();

        $('#cake_type').change(function () {
            var cake_type = $(this).val();

            $.ajax({
                type: "GET",
                url: "/cakerequest/servedamount",
                async: true,
                cache: false,
                data: {CakeType: cake_type},
                timeout: 50000,
                success: function (data) {
                    $('#served_amount').html(data.served_amount);
                    //  alert(data);
                    /*for(var key in data){
                     alert(data[key].served_amount);
                     }*/


                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
//                    setTimeout(waitForMsg, 15000);
                }
            });


        });

        $('#requestQuoteform').validate({
            rules: {
                cake_type: "required",
                served_amount: "required",
                req_date: {
                    date: true,
                },
            },
            messages: {
                cake_type: "Please enter your First Name",
                lastname: "Please enter your Last Name",
                gender: "Please enter your Gender",
                days: "PLease enter your Birth day",
                months: "PLease enter your Birth day",
                years: "PLease enter your Birth day",
                telephone: {
                    required: "PLease enter your mobile phone number",
                    minlength: "PLease enter a valid telephone number"
                },
                email: {
                    remote: "E-mail is already occupied"
                }
            }


        });

    </script>

@endsection
