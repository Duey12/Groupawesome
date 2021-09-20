
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Programmme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Dolphin Cove</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        | Booking
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="http://127.0.0.1:7000/walkin">Walk-In-Guest</a></li>
                        <li><a class="dropdown-item" href="#">Tour-Company-Guest</a></li>
                   </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <h1 class="text-center text-muted" >Programmes</h1>
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
              <th>Programme Name</th>
              <th>Adult Cost</th>
              <th>Children Cost</th>

              @foreach($datastorage as $programinfo)
              <tr>
                <td>{{$programinfo['programme_name']}}</td>
                <td>{{$programinfo['adult_cost']}}</td>
                <td>{{$programinfo['children_cost']}}</td>
                <td><td><a href="{{'edit/'.$programinfo['programme_id']}}">
                <button type="button"class="btn btn-warning">Update Programme</button></a>
<a href="{{'delete/'.$programinfo['programme_id']}}"><button type="button"class="btn btn-danger">Delete Programme</button></a>
                    </td>


              </tr>
              @endforeach
              <tr>
                <td><a href="/add"><button type="button"class="btn btn-primary">Add Program</button><a/></td>              </tr>


                </table>
          </div>
        </div>
    </div>















































<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
