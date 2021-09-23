@extends('layouts.master')
@section('title','create')
@section('content')
<form action="register" method="post">
    @csrf
<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">username</label>
    <input type="text" name="username" class="form-control" placeholder="Enter Your Name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required> 
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  <div class="form-check form-check-inline">
  <input class="form-check-input" name="roleid" value="1" type="radio" id="inlineRadio1">
  <label class="form-check-label" for="inlineRadio1">Admin</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="roleid" value="2"type="radio" id="inlineRadio2">
  <label class="form-check-label" for="inlineRadio2">Cashier</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="roleid" value="3"type="radio" id="inlineRadio2">
  <label class="form-check-label" for="inlineRadio2">Tour Company</label>
</div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection