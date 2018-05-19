
@extends('master')
@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <h1>Add New Tarif</h1>
        <hr>
        <div class="card">
          <div class="card-header">
            <strong>Tarif</strong>
          </div>
          <div class="card-body">
            <form action="{{route('tarif.update', $tarif->id)}}" method="post">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}

              <div class="form-group">
								<label for="uraian">Uraian</label>
								<input type="text" class="form-control" id="uraian" name="uraian" value="{{$tarif->uraian}}">
							</div>

              <div class="form-group">
                <label for="tarif">Tarif</label>
                <select id="tarif" name="tarif" class="form-control form-control">
                  <option value="0" {{($tarif->tarif == 0) ? 'selected' : ''}}>Tidak Ada</option>
                  <option value="1" {{($tarif->tarif == 1) ? 'selected' : ''}}>Ada</option>
                </select>
              </div>

              <div class="form-group">
								<label for="jasa_pelayanan">Jasa Pelayanan</label>
								<input type="number" class="form-control" id="jasa_pelayanan" name="jasa_pelayanan" value="{{$tarif->jasa_pelayanan}}">
							</div>

              <div class="form-group">
								<label for="jasa_sarana">Jasa Sarana</label>
								<input type="number" class="form-control" id="jasa_sarana" name="jasa_sarana" value="{{$tarif->jasa_sarana}}">
							</div>

              <div class="form-group">
                <label for="satuan">Satuan</label>
                <select id="satuan" name="satuan" class="form-control form-control">
                  <option value="">Please Select</option>
                  @foreach (config('pelayanan-kesehatan.satuan') as $key => $satuan)
                    <option value="{{$key}}" {{($key == $tarif->satuan) ? 'selected' : '' }} >{{$satuan}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="master_tarif_id">Master tarif</label>
                <select id="master_tarif_id" name="master_tarif_id" class="form-control form-control">
                  <option value="">Please Select</option>
                  @foreach ($master_tarifs as $key => $master_tarif)
                    <option value="{{$master_tarif->id}}" {{ ($master_tarif->id == $tarif->master_tarif_id) ? 'selected' : '' }}>{{$master_tarif->nama}}</option>
                  @endforeach
                </select>
              </div>

              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
