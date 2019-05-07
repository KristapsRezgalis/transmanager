@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif

  <a href="/kompanijas/create" class="btn btn-primary" role="button">TAISĪT JAUNU KOMPĀNIJU</a>
  <br><br><br>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nosaukums</td>
          <td>Valsts</td>
          <td>Pilsēta</td>
          <td>Iela</td>
          <td>Reģistrācijas Nr.</td>
          <td colspan="2">Darbības</td>
        </tr>
    </thead>
    <tbody>
        @foreach($kompanijas as $kompanija)
        <tr>
            <td>{{$kompanija->id}}</td>
            <td>{{$kompanija->nosaukums}}</td>
            <td>{{$kompanija->valsts}}</td>
            <td>{{$kompanija->pilseta}}</td>
            <td>{{$kompanija->iela}}</td>
            <td>{{$kompanija->reg_numurs}}</td>
            <td><a href="{{ route('kompanijas.edit',$kompanija->id)}}" class="btn btn-primary">LABOT</a></td>
            <td>
                <form action="{{ route('kompanijas.destroy', $kompanija->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">DZĒST</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection