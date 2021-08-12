@extends('layout.master2')
@section('content')
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
  <form method="POST" action="{{route('site.postRegister')}}">
    @csrf
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adı</label>
    <input type="text" class="form-control" name="first_name" >
  </div>
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Soyadı</label>
    <input type="text" class="form-control" name="last_name" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">E-Mail Adresi</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Şifre</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>

  <button type="submit" class="btn btn-primary">Kayıt Ol</button>
</form>
</div>
@endsection