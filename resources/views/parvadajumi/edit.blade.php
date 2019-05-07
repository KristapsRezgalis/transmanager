@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    LABOT PĀRVADĀJUMU
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
      <form method="post" action="{{ route('parvadajumi.update', $parvadajums->id) }}">
        @method('PATCH')
        
        <div class="form-group">
          @csrf
          <label for="iekrausanas_datums">IEKRAUSANAS DATUMS:</label>
          <input type="date" class="form-control" name="iekrausanas_datums" value={{ $parvadajums->iekrausanas_datums }} />
        </div>
        <div class="form-group">
          <label for="izkrausanas_datums">IZKRAUSANAS DATUMS:</label>
          <input type="date" class="form-control" name="izkrausanas_datums" value={{ $parvadajums->izkrausanas_datums }} />
        </div>
        
        <div class="form-group">
              <label for="iekrausanas_laiks">IEKRAUŠANAS LAIKS:</label>
              <input type="time" class="form-control" name="iekrausanas_laiks" value={{ $parvadajums->iekrausanas_laiks }} />
          </div>
          <div class="form-group">
              <label for="izkrausanas_laiks">IZKRAUŠANAS LAIKS:</label>
              <input type="time" class="form-control" name="izkrausanas_laiks" value={{ $parvadajums->izkrausanas_laiks }} />
          </div>

        <div class="form-group">
        <label for="iekrausanas_vieta_id">IEKRAUSANAS VIETA:</label>
        <select  type="text" class="form-control" name="iekrausanas_vieta_id"/>>
                @foreach($vietas as $vieta)
                <option value='{{ $vieta->id }}' {{ ( $parvadajums->iekrausanas_vieta_id ==  $parvadajums->vieta->nosaukums ) ? ' selected' : '' }}> 
                  {{ $vieta->nosaukums }} </option>
                @endforeach
        </select>


        </div>

        <div class="form-group">
        <label for="izkrausanas_vieta_id">IZKRAUSANAS VIETA:</label>
        <select  type="text" class="form-control" name="izkrausanas_vieta_id"/>>
                @foreach($vietas as $vieta)
                <option value='{{ $vieta->id }}' {{ ( $parvadajums->izkrausanas_vieta_id ==  $parvadajums->vieta->nosaukums ) ? ' selected' : '' }}> 
                  {{ $vieta->nosaukums }} </option>
                @endforeach
        </select>

        <div class="form-group">
        <label for="klients_id">KLIENTS:</label>
        <select  type="text" class="form-control" name="klients_id"/>>
                @foreach($kompanijas as $kompanija)
                <option value='{{ $kompanija->id }}' {{ ( $parvadajums->klients_id ==  $parvadajums->kompanija->nosaukums ) ? ' selected' : '' }}> 
                  {{ $kompanija->nosaukums }} </option>
                @endforeach
        </select>

        <div class="form-group">
        <label for="parvadatajs_id">PARVADATAJS:</label>
        <select  type="text" class="form-control" name="parvadatajs_id"/>>
                @foreach($kompanijas as $kompanija)
                <option value='{{ $kompanija->id }}' {{ ( $parvadajums->parvadatajs_id ==  $parvadajums->kompanija->nosaukums ) ? ' selected' : '' }}> 
                  {{ $kompanija->nosaukums }} </option>
                @endforeach
        </select>

        <div class="form-group">
          <label for="ienemumi">IEŅĒMUMI:</label>
          <input type="text" class="form-control" name="ienemumi" value={{ $parvadajums->ienemumi }} />
        </div>
        <div class="form-group">
          <label for="izmaksas">IZDEVUMI:</label>
          <input type="text" class="form-control" name="izmaksas" value={{ $parvadajums->izmaksas }} />
        </div>
        <div class="form-group">
          <label for="pelna">PEĻŅA:</label>
          <input type="text" class="form-control" name="pelna" value={{ $parvadajums->pelna }} />
        </div>
        <div class="form-group">
          <label for="transporta_numuri">TRANSPORTA NUMURI:</label>
          <input type="text" class="form-control" name="transporta_numuri" value="{{ $parvadajums->transporta_numuri }}" />
        </div>
        <div class="form-group">
          <label for="kravas_apraksts">KRAVAS APRAKSTS:</label>
          <input type="text" class="form-control" name="kravas_apraksts" value="{{ $parvadajums->kravas_apraksts }}" />
        </div>
        <button type="submit" class="btn btn-primary">LABOT</button>
      </form>
  </div>
</div>
@endsection