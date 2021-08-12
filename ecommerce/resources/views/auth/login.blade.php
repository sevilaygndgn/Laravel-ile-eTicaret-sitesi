@extends('layout.master2')
@section('content')
<div class="container">
  <form method="POST" action="{{route('site.postLogin')}}">
    @csrf
 <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">E-Mail Adresi</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Şifre</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection