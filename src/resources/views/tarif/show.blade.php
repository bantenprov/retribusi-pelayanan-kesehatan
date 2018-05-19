@extends('master')
@section('content')
<div class="jumbotron text-center">
  <h1>{{$tarif->uraian}}</h1>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title"><h2>{{$tarif->uraian}}</h2></h5>
    <h6 class="card-subtitle mb-2 text-muted">Created : {{$tarif->created_at}}</h6>
    <hr />

    <a href="{{ route('tarif.create') }}">
      <button type="button" class="btn btn-success">Add New</button>
    </a>
    <a href="{{route('tarif.edit',$tarif->id)}}">
      <button type="button" class="btn btn-warning">Edit</button>
    </a>
  </div>
  <div class="card-footer">
    <span class="pull-left">Created by : {{$tarif->getUserCreated->name}} </span>
    <span class="pull-right">Updated by : {{$tarif->getUserUpdated->name}} </span>
  </div>
</div>

@endsection
