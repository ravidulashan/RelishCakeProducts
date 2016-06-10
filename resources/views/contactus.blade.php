<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 5/31/2016
 * Time: 11:17 PM
 */
        ?>
@extends('layouts.master')
@section('title','Contact')
@section('contact_active','active')
@section('body')
<section id="contact-info">
    <div class="center">
        <h2>How to Reach Us?</h2>
        <p class="lead">We have one shop open and many more to come</p>
    </div>
    <div class="gmap-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 text-center">
                    <div class="gmap">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3960.769772719839!2d79.922861!3d6.9181047!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2575c3f4f4c95%3A0x3e42fcb802c84bf5!2sSumedha+Mawatha%2C+Kolonnawa!5e0!3m2!1sen!2slk!4v1464633681861" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-sm-7 map-content">
                    <ul class="row">
                        <li class="col-sm-6">
                            <address>
                                <h5>Head Office</h5>
                                <p>19/3 <br>
                                    Walpola, Mulleriyawa new town 10600</p>
                                <p>Phone:011 2567 400 <br>
                                    Email Address:ravidu.lashan@gmail.com</p>
                            </address>


                        </li>



                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>  <!--/gmap_area -->

<div id="contact-page" class="container" style="position: relative;margin-top: 40px">
    <div class="bg">
        <div class="row">
            <!--	<div class="col-sm-12">
                                    <h2 class="title text-center">Contact <strong>Us</strong></h2>
                                    <div id="gmap" class="contact-map">
                                    </div>
                            </div>			 		-->

        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="sendemail.php">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="social-networks">
                    <h2 class="title text-center">Social Networking</h2>
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contact-page-->
@endsection