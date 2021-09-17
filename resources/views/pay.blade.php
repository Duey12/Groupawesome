@extends('layouts.master')
@section('title','create')
@section('content')
    <h1 class="text-center text-muted" >Payment Portal</h1>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <style>
            body {
                background-color: #bce8ff
            }

            .container {
                margin-top: 40px;
                margin-bottom: 40px
            }

            img {
                width: 100%
            }

            .card-title {
                justify-content: space-between;
                margin-top: 25px
            }

            .register {
                font-size: 10px;
                position: relative;
                bottom: 5px
            }

            .cvc {
                width: 2.5em;
                position: absolute
            }

            input {
                border: none;
                padding-left: 4px;
                background-color: #f7f1f1;
                font-size: 15px
            }

            .card-body {
                background-color: #f7f1f1
            }

            .footer {
                background-color: #00BCD4;
                color: white
            }

            .footer:hover {
                cursor: pointer;
                background-color: #0097A7
            }

            .numbr {
                border-bottom: 1px solid #c1bcbc;
                padding-bottom: 8px
            }

            .line2 {
                border-bottom: 1px solid #c1bcbc;
                padding-bottom: 8px;
                padding-left: 0px
            }

            input.focus,
            input:focus {
                outline: 0;
                box-shadow: none !important
            }

            .numbr.numbr.hover,
            .numbr:hover {
                border-bottom: 1px solid aqua
            }

            .line2.hover,
            .line2:hover {
                border-bottom: 1px solid aqua
            }

            .fa-lock {
                margin-right: 10px
            }

            .order {
                margin-top: 10px
            }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  </div>
        </style>
    </head>

    <div class="container-fluid">
        <div class='container'>
          <div class='table-responsive'>
            <table class='table table-bordered'>
              <tr>
              <td>{{'Customer Name'}}</td>
              <td>{{$user['guest_name']}}</td>
              </tr>
              <th>Programme Name</th>
              <th>Number of Adults</th>
              <th>Cost of Adults</th>
              <th>Number of Children</th>
              <th>Children cost</th>
              <th>Total</th>
<?php $a=0;?>
              @foreach($booking as $booking_info)
              <tr>
                <td>{{$booking_info['programme_name']}}</td>
                <td>{{$booking_info['adults_num']}}</td>
                <td>{{$booking_info['adult_cost']}}</td>
                <td>{{$booking_info['child_num']}}</td>
                <td>{{$booking_info['child_cost']}}</td>
                <td>{{$booking_info['total_cost']}}</td>
                  <?php $a=$a+ $booking_info['total_cost'];?>
              </tr>
              @endforeach
                <?php session()->put('tcost',$a);?>
                {{"cost". session()->get('tcost')}}
              <tr>
                <td><a href="/walkin/{{$booking_info['booking_id']}}"><button type="button" class="btn btn-primary">Add Excurison</button></a></td>
              </tr>
            </table>
          </div>
        </div>
    </div>
@endsection
