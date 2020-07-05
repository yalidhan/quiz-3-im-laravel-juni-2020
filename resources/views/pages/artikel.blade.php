@extends('layouts.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Halaman Artikel</h1>

<div class="container mb-4"><center>
<button type="button" class="btn btn-dark" >
<a href="/artikel/create"style="color:#fff!important;">Buat Artikel</a>
</button></br></center>
</div>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Judul</th>
      <th scope="col">Isi</th>
      <th scope="col">Slug</th>
      <th scope="col">Tag</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($artikel as $key =>$artkl)
    <tr>
      <th scope="row">{{$key+1}}</td></th>
      <td>{{$artkl->judul}}</td>
      <td>{{$artkl->isi}}</td>
      <td>{{$artkl->slug}}</td>
      <td>{{$artkl->tag}}</td>
      <td>
      <a class="btn btn-primary" href="/artikel/{{$artkl->id}}" role="button" >Detail</a>
      <a class="btn btn-warning" href="/artikel/{{$artkl->id}}/edit" role="button">Edit</a>
      <form action="/artikel/{{$artkl->id}}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" role="button">Hapus</button>
      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

@push('scripts')
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>
@endpush