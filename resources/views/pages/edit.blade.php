@extends('layouts.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Form Edit Artikel</h1>
<form action="/artikel/{{$article->id}}" method="POST">
@csrf
@method('put')
    <input type="hidden" value="{{$article->id_user}}" name="id_user">
  <div class="form-group">
    <label for="judul">Judul article</label>
    <input type="text" class="form-control" value="{{$article->judul}}"name="judul" id="judul" required>
  </div>
  <div class="form-group">
    <label for="isi">Isi article</label>
    <textarea class="form-control" name="isi" required placeholder="Tuliskan article anda di sini"rows="5" id="isi">{{$article->isi}}</textarea>
  </div>
  <div class="form-group">
    <label for="slug">Slug article</label>
    <input type="text" class="form-control" name="slug" value="{{$article->slug}}" required id="slug">
  </div>
  <div class="form-group">
    <label for="tag">Tag article</label>
    <input type="text" class="form-control" name="tag" value="{{$article->tag}}" required id="tag">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  
</form>

@endsection