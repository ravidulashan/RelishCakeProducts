<?php
/**
 * Created by PhpStorm.
 * User: RAVIDU-PC
 * Date: 5/29/2016
 * Time: 12:24 PM
 */
?>
@extends('layouts.master')
@section('title','Reports')
@section('report_active','active')
@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>


                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a
                                                href="">Sales per month</a></h4>
                                </div>
                            </div>

                        </div><!--/category-products-->


                    </div>
                </div>


                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="product-information"><!--/product-information-->
                            {{--<div style="width:30%">--}}
                                <div style="width: 80%">
                                    <canvas id="canvas" height="450" width="600"></canvas>
                                </div>
                            {{--</div>--}}

                        </div><!--/product-information-->

                    </div><!--/product-details-->
                </div>

            </div>

        </div>
    </section>
@endsection
@section('scripts')
 <script src="{{asset('js/Chart.js')}}"></script>
   <script>


       var lineChartData = {
           labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
           datasets : [
               {
                   label: "No of sales",
                   fillColor : "rgba(220,220,220,0.2)",
                   strokeColor : "rgba(220,220,220,1)",
                   pointColor : "rgba(220,220,220,1)",
                   pointStrokeColor : "#fff",
                   pointHighlightFill : "#fff",
                   pointHighlightStroke : "rgba(220,220,220,1)",
                   data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
               }

           ]

       }

       window.onload = function(){
           var ctx = document.getElementById("canvas").getContext("2d");
           window.myLine = new Chart(ctx).Line(lineChartData, {
               responsive: true
           });
       }

    </script>

@endsection
