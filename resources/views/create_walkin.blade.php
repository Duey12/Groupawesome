@extends('layouts.master')
@section('title','Create-Walk-In')
@section('content')
    <br><br>
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
                          <option>0</option>
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
                          <option>0</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                        </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Excursion Date</label>
                  <div class="col-sm-2">
                      <input type="date" class="form-control" name="date">
                      <input type="hidden" name="booking" value="{{$booking}}">
                  </div>
              </div>
            </div>

              <br>
              <button class="btn btn-success" type="submit">Submit</button>


        </form>
    </div>
@endsection
