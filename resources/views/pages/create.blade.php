@extends('layouts.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Form Artikel Baru</h1>
<form action="/artikel" method="POST">
@csrf
    <input type="hidden" value="1" name="id_user">
  <div class="form-group">
    <label for="judul">Judul Artikel</label>
    <input type="text" class="form-control" name="judul" id="judul" required>
  </div>
  <div class="form-group">
    <label for="isi">Isi artikel</label>
    <textarea class="form-control" name="isi" required placeholder="Tuliskan artikel anda di sini"rows="5" id="isi"></textarea>
  </div>
  <div class="form-group">
    <label for="tag">Tag Artikel</label>
    <input type="text" class="form-control" name="tag" required id="tag">
    <small id="emailHelp" class="form-text text-muted">Gunakan pemisah spasi untuk memasukkan tag</small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>

@endsection