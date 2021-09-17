@extends('layouts.master')
@section('title','excursion booking')
@section('content')
    <br><br>
    <h1 class="text-center text-muted" >Excursion Bookings</h1>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>excursion booking</title>
    </head>

    <div class="container-fluid">
        <div class='container'>
          <div class='table-responsive'>
            <table class='table table-bordered'>
              <tr>
              <td><h4>{{'Customer Name'.":"}}</h4></td>
                  <?php $name = ucwords($user['guest_name']) ?>
              <td><h4>{{$name}}</h4></td>
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
                <tr>
                <td><a href="/walkin/{{$booking_info['booking_id']}}"><button type="button" class="btn btn-primary">Add Excurison</button></a></td>
                <td><a href="{{url('/payment')}}"><button type="button" class="btn btn-success">Order Complete</button></a></td>
                 <td></td>
                 <td></td>
                 <td></td>
                  <td>  <b>{{session()->get('tcost').".00"}}</b></td>
              </tr>
            </table>
          </div>
        </div>
    </div>
@endsection
