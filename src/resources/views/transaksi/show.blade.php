@extends('master')
@section('content')
<div class="jumbotron text-center">
  <h1>#####</h1>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title"><h2>####</h2></h5>
    <h6 class="card-subtitle mb-2 text-muted">Created : ####</h6>
    <hr />

    <a href="{{ route('tarif.create') }}">
      <button type="button" class="btn btn-success">Add New</button>
    </a>
    <a href="#">
      <button type="button" class="btn btn-warning">Edit</button>
    </a>
  </div>
  <div class="card-footer">
    <span class="pull-left">Created by : ##### </span>
    <span class="pull-right">Updated by : ##### </span>
  </div>
</div>

@endsection
