@extends('yonetim.layouts.master')
@section('title', 'Kullanıcı Yönetimi')
@section('content')
    <h1 class="page-header">Kullanıcı Yönetimi</h1>

    <h3 class="sub-header">Kullanıcı Listesi</h3>
    <div class="well">
        <div class="btn-group pull-right">
            <a href="#" class="btn btn-primary">Yeni</a>
        </div>
        <form method="post" action="{{ route('yonetim.kullanici') }}" class="form-inline">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="aranan">Ara</label>
                <input type="text" class="form-control form-control-sm" name="aranan" id="aranan" placeholder="Ad, Email Ara..." value="{{ old('aranan') }}">
            </div>
            <button type="submit" class="btn btn-primary">Ara</button>
            <a href="{{ route('yonetim.kullanici') }}" class="btn btn-primary">Temizle</a>
        </form>
    </div>

  

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Ad Soyad</th>
                <th>Email</th>
              
                <th>Kullanıcı Tipi</th>
                <th>Kayıt Tarihi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if (count($list) == 0)
                <tr><td colspan="7" class="text-center">Kayıt bulunamadı!</td></tr>
            @endif
            @foreach ($list as $entry)
                <tr>
                    <td>{{ $entry->id }}</td>
                    <td>{{ $entry->first_name }}</td>
                    <td>{{ $entry->email }}</td>
                    
                    <td>
                        @if ($entry->yonetici_mi)
                            <span class="label label-success">Yönetici</span>
                        @else
                            <span class="label label-warning">Müşteri</span>
                        @endif
                    </td>
                    <td>{{ $entry->created_at }}</td>
                    <td style="width: 100px">
                        <a href="#" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Emin misiniz?')">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $list->links() }}
    </div>
@endsection