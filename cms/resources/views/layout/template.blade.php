<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TRY</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('categories')}}" >Categories</a>
    </div>
    <div class="nav navbar-nav navbar-right">
        <li><a href="{{ url('categories')}}" >Home</a></li>
        <li><a href="{{ url('categories')}}" >Categories</a></li>
    </div>
  </div>
</nav>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

</body>
</html>