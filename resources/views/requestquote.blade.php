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
                                                    <form method="POST" id="requestQuoteLoggedform" action="{{url('/quoterequest/imagelogged')}}">
                                                        {{csrf_field()}}
                                                        <h2>Request Quote</h2>
                                                        <input type="hidden" value="{{$cake->img_url}}" name="img_url"
                                                               id="img_url">
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
                                                        <input type="text" class="span2" id="reqdate"
                                                               placeholder="Required date" name="reqdate">

                                                        <button type="submit" id="signup" class="btn btn-default">Submit
                                                        </button>
                                                    </form>
                                                </div><!--/sign up form-->
                                            @else
                                                <div class="requestQuote"><!--sign up form-->
                                                    <form method="POST" id="requestQuoteform" action="#">
                                                        {{csrf_field()}}
                                                        <h2>Request Quote</h2>
                                                        <input type="hidden" value="{{$cake->img_url}}" name="img_url"
                                                               id="img_url">
                                                        <input type="text" id=firstname name="firstname"
                                                               placeholder="First Name"/>
                                                        <input type="text" id=lastname name="lastname"
                                                               placeholder="Last Name"/>

                                                        <input type="text" id="telephone" name="telephone"
                                                               placeholder="Mobile number"/>
                                                        <input type="email" id="email" name="email"
                                                               placeholder="Email Address"/>
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
                                                        <input type="text" class="span2" id="reqdate"
                                                               placeholder="Required date" name="reqdate">


                                                        <button type="submit" id="signup" class="btn btn-default">Signup
                                                        </button>
                                                    </form>
                                                </div><!--/sign up form-->
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

$("#signup").on("click",function(){
   alert($("#reqdate").val());
});
        var actualDate = new Date();
        var newDate = new Date(actualDate.getFullYear(), actualDate.getMonth(), actualDate.getDate() + 5);
        var actualnewDate = new Date(actualDate.getFullYear(), actualDate.getMonth(), actualDate.getDate() + 60);

        jQuery.validator.addMethod("datarange", function(value, element){
            var d=new Date(value);
            if (d<actualnewDate && d>newDate) {
                return true;
            } else {
                return false;
            };
        },"Please select a date between "+newDate.toDateString()+" and "+actualnewDate.toDateString());


        $('#requestQuoteLoggedform').validate({
            rules: {
                cake_type: "required",
                served_amount: "required",
                reqdate: {
                    required: true,
                    date: true,
                   datarange:true
                }

            },
            messages: {
                cake_type: "Please select cake type",
                served_amount: "Please select served amount",
                req_date: {
                    required: "Please select a request date",
                    date: "Please enter a valid date",

                }
            }

        });


        $('#requestQuoteform').validate({
            rules: {
                firstname:{
                    required:true,
                    lettersonly:true
                } ,
                lastname: {
                    required:true,
                    lettersonly:true
                },
                cake_type: "required",
                served_amount: "required",
                reqdate: {
                    required: true,
                    date: true,
                    datarange:true
                },
                telephone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                email: {
                    required: true,
                    email: true

                }

            },
            messages: {
                firstname: "Please enter your First Name",
                lastname: "Please enter your Last Name",
                cake_type: "Please select cake type",
                served_amount: "Please select served amount",
                req_date: {
                    required: "Please select a request date",
                    date: "Please enter a valid date"
                },
                telephone: {
                    required: "PLease enter your mobile phone number",
                    minlength: "PLease enter a valid telephone number"
                }
            }

        });

        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        var reqdate = $('#reqdate').datepicker({
            onRender: function (date) {

                return date.valueOf() < newDate.valueOf() ? 'disabled' : '';

            }
        }).data('datepicker');

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

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
//                    setTimeout(waitForMsg, 15000);
                }
            });


        });


    </script>

@endsection
