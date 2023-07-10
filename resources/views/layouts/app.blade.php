<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
 <!-- Grey with black text -->
<nav class="navbar navbar-expand-sm bg-dark">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-light" href="/">THE CRUD </a>
      </li>

    </ul>
  </nav>

    @if($message = Session::get('success'))
        <div class="alert alert-success text-center">
                <strong>{{  $message }}</strong>
        </div>
    @endif


    @yield('main')




</body>
</html>
