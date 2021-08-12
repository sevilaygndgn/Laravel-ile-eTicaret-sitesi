<div class="container">
  <form action=" {{route('AdminController.postListele')}}" method="POST">
    @csrf

    <label >Ürün Adı</label>
    <input type="text"  name="urun" class="form-control">

    <label >Ürün Açıklama</label>
    <input type="text" name="urunaciklama" class="form-control" >

    <label >Ürün resmi</label>
    <input type="file" name="urunresmi" class="form-control" >

    <label >Ürün Fiyat</label>
    <input type="number" name="urunfiyat" class="form-control" >
 
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>