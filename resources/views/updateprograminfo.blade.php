
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update-Programme</title>
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
        <button class="navbar-toggler" type="button" datastorage-bs-toggle="collapse" datastorage-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/programmes">Programme</a>
                </li>
                {{-- <li class="nav-item dropdown"> --}}
                    <a class="nav-link dropdown-toggle" href="#"  role="button" aria-expanded="false">
                        | Update Programme
                    </a>
                    {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> --}}
                        {{-- <li><a class="dropdown-item" href="/programme">Programme</a></li>
                        <li><a class="dropdown-item" href="#">Add Programme</a></li> --}}
                   </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <h1 class="text-center text-muted" >Update Programme</h1>

    <br>
    <div class="container-fluid flex align-item-center justify-center">
        <form action="/edit"  method="post" >
            @csrf

                     <div class="form-group row">
                <label class="col-sm-2 col-form-label">Programme Id</label>
                <div class="col-sm-4">
                                      <input type="text" class="form-control" name="id"  value="{{$datastorage[0]['programme_id']}}">


                                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Programme Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="pname" value="{{$datastorage[0]['programme_name']}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Adult Cost</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="adult_cost" value="{{$datastorage[0]['adult_cost']}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Children Cost</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="children_cost" value="{{$datastorage[0]['children_cost']}}">
                </div>
            </div>


              <br>
              <button class="btn btn-primary" type="submit">Save</button>









































        </form>
    </div>




























































































<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
