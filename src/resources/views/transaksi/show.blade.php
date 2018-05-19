@extends('master')
@section('content')
<div class="jumbotron text-center">
  <h1>{{$transaksi->nomor}}</h1>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title"><h2>{{$transaksi->nomor}}</h2></h5>
    <h6 class="card-subtitle mb-2 text-muted">Created : {{$transaksi->created_at}}</h6>
    <hr />

    <a href="{{ route('tarif.create') }}">
      <button type="button" class="btn btn-success">Add New</button>
    </a>
    <a href="{{ route('tarif.edit', $transaksi->id) }}">
      <button type="button" class="btn btn-warning">Edit</button>
    </a>
  </div>
</div>

@endsection
