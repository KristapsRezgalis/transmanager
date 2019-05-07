@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    LABOT VIETU
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
      <form method="post" action="{{ route('vietas.update', $vieta->id) }}">
        @method('PATCH')
        @csrf

        <div class="form-group">
          <label for="nosaukums">NOSAUKUMS:</label>
          <input type="text" class="form-control" name="nosaukums" value="{{ $vieta->nosaukums }}" />
        </div>
        <div class="form-group">
          <label for="price">VALSTS :</label>
          <input type="text" class="form-control" name="valsts" value={{ $vieta->valsts }} />
        </div>
          <div class="form-group">
          <label for="quantity">PILSĒTA:</label>
          <input type="text" class="form-control" name="pilseta" value="{{ $vieta->pilseta }}" />
        </div>
        <div class="form-group">
          <label for="price">IELA :</label>
          <input type="text" class="form-control" name="iela" value="{{ $vieta->iela }}" />
        </div>
        <div class="form-group">
          <label for="quantity">PASTA KODS:</label>
          <input type="text" class="form-control" name="pasta_kods" value="{{ $vieta->pasta_kods }}" />
        </div>
        <div class="form-group">
          <label for="price">LATITUDE :</label>
          <input type="text" class="form-control" name="latitude" value={{ $vieta->latitude }} />
        </div>
        <div class="form-group">
          <label for="quantity">LONGITUDE:</label>
          <input type="text" class="form-control" name="longitude" value={{ $vieta->longitude }} />
        </div>
        <button type="submit" class="btn btn-primary">LABOT</button>
      </form>
  </div>
</div>
@endsection