<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Eticaret-Yönetim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="form-signin"  action="{{route('yonetim.postadmin')}}" method="POST">
        @csrf
        <img src="/img/logo.png" class="logo">
        <label for="email" class="sr-only">Email</label>
        <input type="email"  name="email" class="form-control" placeholder="Email" required autofocus>
        <label for="password" class="sr-only">Şifre</label>
        <input type="password" name="password" class="form-control" placeholder="Şifre" required aut>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="benihatirla" value="1" checked> Beni hatırla
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş yap</button>
        <div class="links">
            <a href="#">&larr; Siteye dön</a>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>

</html>
