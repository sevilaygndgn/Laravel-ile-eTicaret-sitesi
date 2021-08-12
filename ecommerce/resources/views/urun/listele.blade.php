<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Basic Table</h2>
              
  <table class="table">
  	@csrf
    <thead>
      <tr>
        <th>ÜRÜN ADI</th>
        <th>ÜRÜN AÇIKLAMASI</th>
        <th>ÜRÜN RESMİ</th>   
        <th>ÜRÜN Kategorisi</th>   
        <th>ÜRÜN FİYATI</th>   

      </tr>
    </thead>
    @foreach($urun as $index)
    <tbody>
      <tr>
        <td> {{$index->urun}} </td>
        <td> {{$index->urunaciklama}} </td>
        <td> {{$index->urunresmi}} </td>
        <td> {{$index->urunfiyat}} </td>
        <td><a href="{{route('AdminController.getUpdate',array('id'=>$index->id))}}" class="btn btn-primary"> güncelle</a>
        	<a href="{{route('AdminController.getDelete',array('id'=>$index->id))}}" class="btn btn-danger">sil</a></td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>

</body>
</html>