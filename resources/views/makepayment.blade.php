@extends('layouts.master')
@section('title','Payment Portal')
@section('content')
    <br><br>
    <h1 class="text-center text-muted" >Payment Portal</h1>

    <br>
    <div class="container-fluid flex align-item-center justify-center">
        <h2>Cash Payment</h2>
        <form method="post" action="{{route('payment')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="cash" name="cash">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Order Total</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{session()->get('tcost')}}" name="order_total" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Amount Received </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="amnt_rec" >
                </div>
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
            <button class="btn btn-warning" type="submit">Clear</button>
         </form>
        <br><hr>
        <h2>Card Payment</h2>
        <form method="post" action="{{route('payment')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="card" name="card">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Order Total</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{session()->get('tcost')}}" name="order_total" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Card Type</label>
                <div class="col-sm-2">
                    <select name="card_type" class="form-control" >
                        <option>Select Card Type</option>
                        <option>Debit</option>
                        <option>Credit</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Card Number</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="card_num" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Card Holder</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="card_holder" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Expiry Date</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="exp_date" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">CVC</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="cvc" >
                </div>
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
            <button class="btn btn-warning" type="submit">Clear</button>
        </form>
        <br><hr>

    </div>
@endsection
