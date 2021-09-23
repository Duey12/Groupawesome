<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d9d2bd3ef6.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/dol2.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <style media="screen">
      .list-unstyled li {
        font-size: 1.5em;
      }
      .fa-google-plus-g{
        color:red;
      }
      footer{
        background-color:black;
        color: white;
        padding: 2rem;
      }
    </style>
    <title>Dolphin Cove</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top row">
      <div class="container-fluid">
        <a class="navbar-brand col-sm-4" href=""><img src="dol2.png" alt="" width="100" height="100"></a>
        <h1 class="navbar-text col-sm-4">Dolphin Cove</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#info">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="info">
          <ul class="navbar-nav col-sm-4 ms-auto">
              <li class="nav-item ms-auto">
                <a class="nav-link" href="/signin">Login</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>
      <div id="slides" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="dol.jpg" class="d-block w-100" height="600px">
          </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slides" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slides" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
  </body>
</html>
