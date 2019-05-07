@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    VEIDOT VIETU
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form method="post" action="{{ route('vietas.store') }}">

          <div class="form-group">
            @csrf
              <label for="nosaukums">NOSAUKUMS:</label>
              <input type="text" class="form-control" name="nosaukums"/>
          </div>
          <div class="form-group">
              <label for="valsts">VALSTS :</label>
              <input type="text" class="form-control" name="valsts"/>
          </div>
          <div class="form-group">
              <label for="pilseta">PILSĒTA:</label>
              <input type="text" class="form-control" name="pilseta"/>
          </div>
          <div class="form-group">
              <label for="iela">IELA :</label>
              <input type="text" class="form-control" name="iela"/>
          </div>
          <div class="form-group">
              <label for="pasta_kods">PASTA KODS:</label>
              <input type="text" class="form-control" name="pasta_kods"/>
          </div>
          <div class="form-group">
              <label for="latitude">LATITUDE :</label>
              <input type="text" class="form-control" name="latitude"/>
          </div>
          <div class="form-group">
              <label for="longitude">LONGITUDE:</label>
              <input type="text" class="form-control" name="longitude"/>
          </div>
          <button type="submit" class="btn btn-primary">TAISĪT</button>
      </form>

  </div>
</div>
@endsection