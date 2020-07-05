@extends('layouts.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Detail Artikel</h1>
<div class="card">
  <div class="card-header">
    Judul : {{$article->judul}}    
  </div>
  <div class="card-body">
    <h5 class="card-title">Slug : {{$article->slug}}</h5>
    <p class="card-text">{{$article->isi}}</p>
    @foreach($tags as $tag)
     <a href="#" class="btn btn-primary">{{$tag}}</a>
    @endforeach
    
  </div>
</div>
</form>

@endsection