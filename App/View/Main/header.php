<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="public/docs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<img src="./public/img/images.png" alt="Icon People" width="60px" height="50px">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?index">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?create">Create</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?contato">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?quemsomos">Are</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="App/View/User/find.php" method="GET">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</body>
</html>