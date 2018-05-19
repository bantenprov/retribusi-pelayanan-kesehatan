@extends('master')
@section('content')
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Tarif
            <a href="{{ route('tarif.create') }}" class="float-right">
              <button type="button" class="btn btn-warning">Add new</button>
            </a>&nbsp;
          </div>
          <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Uraian</th>
                  <th scope="col">Master Tarif</th>
                  <th scope="col">Jasa Pelayanan</th>
                  <th scope="col">Jasa Sarana</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Tarif</th>
                  <th scope="col">Created at</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
                @foreach($tarifs as $key => $tarif)
                <tr>
                  <th scope="row" id="{{$tarif->id}}">{{ ++$key }}</th>
                  <td>
                    <a href="{{route('tarif.show',$tarif->id)}}">{{$tarif->uraian}}</a>
                  </td>
                  <td>{{$tarif->getMasterTarif->nama}}</td>
                  <td>{{$tarif->jasa_pelayanan}}</td>
                  <td>{{$tarif->jasa_sarana}}</td>
                  <td>{{$tarif->satuan}}</td>
                  <td>{{($tarif->tarif == 1) ? 'Ada' : 'Tidak Ada'}}</td>
                  <td>{{$tarif->created_at->toFormattedDateString()}}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{ route('tarif.edit',$tarif->id) }}">
                        <button type="button" class="btn btn-warning">Edit</button>
                      </a>&nbsp;
                      <form action="{{route('tarif.destroy',$tarif->id)}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="Delete" />
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              <tbody>

              </tbody>
            </table>
            <nav>
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <!--/.col-->
    </div>
    <!--/.row-->
  </div>
</div>

@endsection
