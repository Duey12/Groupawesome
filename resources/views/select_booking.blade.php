<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d9d2bd3ef6.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <x-adminnavbar/>
    <div class="table-responsive">
      <table class="table">
      <tr>
        <th>Guest Name</th>
        <th>Guest Type</th>
        </tr>
        <tr>
          <td>{{$booking[0]['guest_name']}}</td>
          <td>{{$booking[0]['guest_type']}}</td>
        </tr>
        <tr>
        </tr>
      </table>
      <h1 class="text-center">Programmes</h1>
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>Programme Name</th>
            <th>Number of Adults</th>
            <th>Cost of Adults</th>
            <th>Number of Children</th>
            <th>Children cost</th>
            <th>Excursion Date</th>
            <th>Total</th>
            @php
            $total=0;
            @endphp
            </tr>
          @foreach($booking as $booking_info)
          <tr>
            <td>{{$booking_info['programme_name']}}</td>
            <td>{{$booking_info['adults_num']}}</td>
            <td>{{$booking_info['adult_cost']}}</td>
            <td>{{$booking_info['child_num']}}</td>
            <td>{{$booking_info['child_cost']}}</td>
            <td>{{$booking_info['exc_date']}}</td>
            <td>{{$booking_info['total_cost']}}</td>
            @php
            $total=$total+$booking_info['total_cost'];
            @endphp
          </tr>
          <tr>
          </tr>
          @endforeach
        </table>
        @if($guest)
        <h1 class="text-center">Hotel</h1>
        <div class="table-responsive">
          <table>
            <tr class="text-center">
              <td class="text-center">{{$guest[0]['hotel_name']}}</td>
            </tr>
          </table>
        </div>
        <hr>
        <h1 class="text-center">Tour Company</h1>
        <div class="table-responsive">
          <table>
            <tr class="text-center">
              <td class="text-center">{{$guest[0]['tour_comp_name']}}</td>
            </tr>
          </table>
        </div>
        <hr>
      @endif
      <h1 class="text-center">Booking Total</h1>
      <div class="table-responsive">
        <table>
          <tr class="text-center">
            <td class="text-center"><b>${{$total}}</b></td>
          </tr>
        </table>
      </div>
      <hr>
      <h1 class="text-center">Payment Detail</h1>
      <div class="table-responsive">
        <table>
          <tr>
            <th>Payment Type</th>
            <th>Amount Paid</th>
            <th>Confirmation Number</th>
          </tr>
          <tr class="text-center">
            <td class="text-center">{{$booking[0]['payment_type']}}</td>
            <td class="text-center">{{$booking[0]['amt_paid']}}</td>
            <td class="text-center">{{$booking[0]['confirm_num']}}</td>

          </tr>
        </table>
      </div>
  </body>
</html>
