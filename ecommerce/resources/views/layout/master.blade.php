<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">ETİCARET</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('site.getIndex')}}">Anasayfa</a>
        </li>

        @if(Sentinel::getUser() == TRUE)

         <li class="nav-item">
          <a class="nav-link" href="{{route('site.getLogout')}}">{{Sentinel::getUser()->email}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('site.getLogout')}}">Çıkış Yap</a>
        </li>

       @else
 <li class="nav-item">
          <a class="nav-link" href="{{route('site.getLogin')}}">Giriş Yap</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="{{route('site.getRegister')}}">Kayıt Ol</a>
        </li>
       @endif
      </ul>
    
    </div>
  </div>
</nav>
@yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>

