@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    LABOT KOMPĀNIJU
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
      <form method="post" action="{{ route('kompanijas.update', $kompanija->id) }}">
        @method('PATCH')
        
        <div class="form-group">
          @csrf
          <label for="nosaukums">NOSAUKUMS:</label>
          <input type="text" class="form-control" name="nosaukums" value="{{ $kompanija->nosaukums }}" />
        </div>
        <div class="form-group">
          <label for="valsts">VALSTS :</label>
          <input type="text" class="form-control" name="valsts" value={{ $kompanija->valsts }} />
        </div>
                <div class="form-group">
          <label for="pilseta">PILSĒTA:</label>
          <input type="text" class="form-control" name="pilseta" value="{{ $kompanija->pilseta }}" />
        </div>
        <div class="form-group">
          <label for="iela">IELA :</label>
          <input type="text" class="form-control" name="iela" value="{{ $kompanija->iela }}" />
        </div>
        <div class="form-group">
          <label for="pasta_kods">PASTA KODS:</label>
          <input type="text" class="form-control" name="pasta_kods" value="{{ $kompanija->pasta_kods }} "/>
        </div>
        <div class="form-group">
          <label for="reg_numurs">REĢISTRĀCIJAS NUMURS :</label>
          <input type="text" class="form-control" name="reg_numurs" value={{ $kompanija->reg_numurs }} />
        </div>
        <div class="form-group">
          <label for="pvn_numurs">PVN MAKSĀTĀJA NUMURS:</label>
          <input type="text" class="form-control" name="pvn_numurs" value={{ $kompanija->pvn_numurs }} />
        </div>
        <button type="submit" class="btn btn-primary">LABOT</button>
      </form>
  </div>
</div>
@endsection