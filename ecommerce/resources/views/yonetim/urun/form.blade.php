@extends('yonetim.layouts.master')
@section('title', 'Ürün Yönetimi')
@section('content')
    <h1 class="page-header">Ürün Yönetimi</h1>

    <form method="post" action="{{ route('yonetim.urun.kaydet', $entry->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{ $entry->id > 0 ? "Güncelle" : "Kaydet" }}
            </button>
        </div>
        <h3 class="sub-header">
            Ürün {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}
        </h3>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="urun_adi">Ürün Adı</label>
                    <input type="text" class="form-control" id="urun_adi" name="urun_adi" placeholder="Ürün Adı" value="{{ old('urun_adi', $entry->urun_adi) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="hidden" name="original_slug" value="{{ old('slug', $entry->slug) }}">
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug', $entry->slug) }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="aciklama">Açıklama</label>
                    <textarea class="form-control" id="aciklama" name="aciklama" placeholder="Açıklama">{{ old('aciklama', $entry->aciklama) }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fiyat">Fiyatı</label>
                    <input type="text" class="form-control" id="fiyat" name="fiyat" placeholder="Fiyat" value="{{ old('fiyat', $entry->fiyat) }}">
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="kategoriler">Kategoriler</label>
                    <select name="kategoriler[]" class="form-control" id="kategoriler" multiple>
                        @foreach($kategoriler as $kategori)
                            <option value="{{ $kategori->id }}"> {{ $kategori->kategori_adi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
       <div class="form-group">
       <label for="urunresmi">Ürün Resmi </label> 
       <input type="file" id="urunresmi" name="urunresmi">
        
       </div>

    </form>
@endsection

@section('head')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
 $(function(){
  $('#kategoriler').select2({
    placeholder: 'Lütfen kategori seçiniz'
  });
  
 });
 </script>
@endsection
