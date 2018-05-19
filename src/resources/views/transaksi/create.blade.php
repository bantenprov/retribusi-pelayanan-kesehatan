
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
            <form action="{{route('transaksi.store')}}" method="post">
              {{ csrf_field() }}

              <div class="form-group">
								<label for="nomor">Nomor : </label>
                <b>{{ $nomor }}</b>
							</div>

              <div class="form-group">
								<label for="total">Total</label>
								<input type="text" class="form-control" id="total" name="total">
							</div>

              <div class="form-group">
								<label for="grandtotal">Grand Total</label>
								<input type="text" class="form-control" id="grandtotal" name="grandtotal">
							</div>

              <div class="form-group">
								<label for="potongan">Potongan</label>
								<input type="text" class="form-control" id="potongan" name="potongan">
							</div>

              <div class="form-group">
								<label for="denda">Denda</label>
								<input type="text" class="form-control" id="denda" name="denda">
							</div>

              <div class="form-group">
                <label for="daftar_retribusi_id">Retribusi</label>
                <select id="daftar_retribusi_id" name="daftar_retribusi_id" class="form-control form-control">
                  <option value="">Please select</option>
                  @foreach ($daftar_retribusis as $daftar_retribusi)
                    <option value="{{$daftar_retribusi->id}}">{{$daftar_retribusi->nama}}</option>
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
