@extends('layouts.master')
@section('title','Create-Walk-In')
@section('content')
<x-cashiernav/>
  <h1 class="text-center text-muted" >Walk-In Guest</h1>

    <br>
    <div class="container-fluid flex align-item-center justify-center">
        <form method="post" action="{{route('create')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-4">
                  @if(Session('user'))
                    <input type="text" class="form-control" name="gname" placeholder="Name" disabled value="{{Session('user')}}">
                    @else
                    <input type="text" class="form-control" name="gname" placeholder="Name">
                    @endif
                </div>
            </div>
            <div class="wrapper">
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Programme</label>
                  <div class="col-sm-4">
                      <select name="programme" class="form-control" >
                          <option></option>
                         @foreach($programmes as $activity)
                          <option value="{{$activity['programme_id']}}">{{$activity['programme_name']}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Adults</label>
                  <div class="col-sm-4">
                      <select name="adults" class="form-control" >
                          <option></option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>

                      </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Children</label>
                  <div class="col-sm-4">
                      <select name="children" class="form-control" >
                          <option></option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                        </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Excursion Date</label>
                  <div class="col-sm-4">
                      <input type="date" class="form-control" name="date">
                      <input type="hidden" name="booking" value="{{$booking}}">
                  </div>
              </div>
            </div>
{{--            <div class="form-group row">--}}
{{--                <label class="col-sm-2 col-form-label">Payment Method</label>--}}
{{--                <div class="col-sm-4">--}}
{{--                    <select class="form-control">--}}
{{--                        <option>Select a payment method</option>--}}
{{--                        <option value="cash">Cash</option>--}}
{{--                        <option value="credit">Credit</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}
              <br>
              <button class="btn btn-primary" type="submit">Submit</button>


            {{--            <div class="form-group row">--}}
            {{--                <label class="col-sm-2 col-form-label">Name</label>--}}
            {{--                <div class="col-sm-4">--}}
            {{--                    <input type="text" class="form-control" name="gname" placeholder="Name">--}}
            {{--                </div>--}}
            {{--            </div>--}}

{{--


{{--            <div class="form-group row">--}}
{{--                <label class="col-sm-2 col-form-label">Guest Name</label>--}}
{{--                <div class="col-sm-4">--}}
{{--                    <input type="text" class="form-control" name="guestid" placeholder="Guest Name">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--

{{--            <button class="btn btn-primary" type="submit">Enter</button>--}}
{{--            <div class="form-group row">--}}
{{--                <label class="col-sm-2 col-form-label">Brand Name</label>--}}
{{--                <div class="col-sm-4">--}}
{{--                    <input type="text" class="form-control" name="pbrand" placeholder="Brand Name">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="form-group row">--}}
{{--                <label class="col-sm-2 col-form-label">Cost</label>--}}
{{--                <div class="col-sm-4">--}}
{{--                    <input type="text" class="form-control" name="pcost" placeholder="Product Cost">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <button class="btn btn-primary" type="submit">Submit form</button>--}}
{{--            <button type="button" class="btn btn-danger" onclick="window.location.href='{{url('/index')}}';">Cancel</button>--}}

{{--            @foreach ($errors->all() as $error)--}}
{{--                <div class="alert alert-warning"> <strong>Warning!</strong> {{ $error }}    </div>--}}
{{--            @endforeach--}}

{{--            <?php $ses = session()->get('msg') ?>--}}
{{--            @if($ses!='')--}}
{{--                <div class="alert alert-warning"><strong>Warning!</strong> {{ session()->get('msg') }} </div>--}}
{{--                {{session()->forget('msg')}}--}}
{{--            @endif--}}
        </form>
    </div>
@endsection
