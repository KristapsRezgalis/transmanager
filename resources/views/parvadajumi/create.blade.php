@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    VEIDOT PARVADAJUMU
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

      <form method="post" action="{{ route('parvadajumi.store') }}">

          <div class="form-group">
              @csrf
              <label for="iekrausanas_datums">IEKRAUSANAS DATUMS:</label>
              <input type="date" class="form-control" name="iekrausanas_datums"/>

          </div>
          <div class="form-group">
              <label for="izkrausanas_datums">IZKRAUSANAS DATUMS:</label>
              <input type="date" class="form-control" name="izkrausanas_datums"/>
          </div>

          <div class="form-group">
              <label for="iekrausanas_laiks">IEKRAUŠANAS LAIKS:</label>
              <input type="time" class="form-control" name="iekrausanas_laiks"/>
          </div>
          <div class="form-group">
              <label for="izkrausanas_laiks">IZKRAUŠANAS LAIKS:</label>
              <input type="time" class="form-control" name="izkrausanas_laiks"/>
          </div>

          <div class="form-group">
              <label for="iekrausanas_vieta_id">IEKRAUSANAS VIETA:</label>
              <select  type="text" class="form-control" name="iekrausanas_vieta_id"/>>
                @foreach($vietas as $vieta)
                <option value='{{ $vieta->id }}'>{{ $vieta->nosaukums }} </option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="izkrausanas_vieta_id">IZKRAUSANAS VIETA:</label>
              <select  type="text" class="form-control" name="izkrausanas_vieta_id"/>>
                @foreach($vietas as $vieta)
                <option value='{{ $vieta->id }}'>{{ $vieta->nosaukums }} </option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="klients_id">KLIENTS:</label>
              <select  type="text" class="form-control" name="klients_id"/>>
                @foreach($kompanijas as $kompanija)
                <option value='{{ $kompanija->id }}'>{{ $kompanija->nosaukums }} </option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="parvadatajs_id">PARVADATAJS:</label>
              <select  type="text" class="form-control" name="parvadatajs_id"/>>
                @foreach($kompanijas as $kompanija)
                <option value='{{ $kompanija->id }}'>{{ $kompanija->nosaukums }} </option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="ienemumi">IEŅĒMUMI:</label>
              <input type="text" class="form-control" name="ienemumi"/>
          </div>
          <div class="form-group">
              <label for="izmaksas">IZDEVUMI:</label>
              <input type="text" class="form-control" name="izmaksas"/>
          </div>
          <div class="form-group">
              <label for="pelna">PEĻŅA:</label>
              <input type="text" class="form-control" name="pelna"/>
          </div>
          <div class="form-group">
              <label for="transporta_numuri">TRANSPORTA NUMURI:</label>
              <input type="text" class="form-control" name="transporta_numuri"/>
          </div>
          <div class="form-group">
              <label for="kravas_apraksts">KRAVAS APRAKSTS:</label>
              <input type="text" class="form-control" name="kravas_apraksts"/>
          </div>
          <button type="submit" class="btn btn-primary">TAISĪT</button>
      </form>

  </div>
</div>
@endsection