<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 6/6/2016
 * Time: 10:17 AM
 */
?>
@extends('layouts.master')
@section('title','Login or Register')
@section('body')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>

                        <form method="POST">
                            {{ csrf_field() }}
                            <input name="email" type="email" id="email" placeholder="Email Address"/>
                            <input name="password" type="password" id="password" placeholder="Password"/>
							<span>
								<input type="checkbox" class="checkbox">
								Keep me signed in

							</span>
                            @if(session()->has('error'))
                                <p style="color: red;">
                                    {{ session('error') }}
                                </p>
                            @endif
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>

                        <form method="POST" id="signupForm" action="{{ url('/signup') }}">
                            {{csrf_field()}}

                            <input type="text" id=firstname name="firstname" placeholder="First Name"/>
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
                                <select style="display:inline;width:20%;" id="months" name="months"></select>
                                <select style="display:inline;width:20%;" id="months" name="years"></select>
                                <label for="months" style="display:block;" class="error"></label>
                            </div>
                            <input type="text" id="telephone" name="telephone" placeholder="Mobile number"/>
                            <input type="email" id="email" name="email" placeholder="Email Address"/>
                            <input type="password" id="password" name="password" placeholder="Password"/>
                            <input type="password" id="confirm_password" name="confirm_password"
                                   placeholder="Confirm Password"/>
                            <button type="submit" id="signup" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
@section('scripts')
    <script>

        $(function () {

            $('[name="years"]').append($('<option disabled selected/>').val("").html("Year"));
            for (i = new Date().getFullYear(); i > 1960; i--) {
                $('[name="years"]').append($('<option />').val(i).html(i));
            }
            //    $('#months').append(<option value="" disabled selected>Select your option</option>)
            $('[name="months"]').append($('<option disabled selected/>').val("").html("Month"));
            for (i = 1; i < 13; i++) {

                $('[name="months"]').append($('<option />').val(i).html(i));
            }
            updateNumberOfDays();

            $('[name="years"], [name="months"]').change(function () {

                updateNumberOfDays();

            });

        });

        function updateNumberOfDays() {
            $('[name="days"]').html('');
            month = $('[name="months"]').val();
            year = $('[name="years"]').val();
            days = daysInMonth(month, year);
            $('[name="days"]').append($('<option disabled selected/>').val("").html("Day"));
            for (i = 1; i < days + 1; i++) {
                $('[name="days"]').append($('<option />').val(i).html(i));
            }

        }

        function daysInMonth(month, year) {
            return new Date(year, month, 0).getDate();
        }

        $('#signupForm').validate({
            rules: {
                firstname: "required",
                lastname: "required",
                gender: "required",
                days: "required",
                months: "required",
                years: "required",
                telephone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: '/check/',
                        type: "get"
                    }

                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    equalTo: $('#signupForm').find("#password"),
                    minlength: 6

                }
            },
            messages: {
                firstname:"Please enter your First Name",
                lastname: "Please enter your Last Name",
                gender:"Please enter your Gender",
                days:"PLease enter your Birth day",
                months:"PLease enter your Birth day",
                years:"PLease enter your Birth day",
                telephone:{
                    required:"PLease enter your mobile phone number",
                    minlength:"PLease enter a valid telephone number"
                },
                email:{
                  remote:"E-mail is already occupied"
                }
            }


        });


    </script>
@endsection