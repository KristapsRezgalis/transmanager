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

  <a href="/vietas/create" class="btn btn-primary" role="button">TAISĪT JAUNU VIETU</a>
  <br><br><br>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nosaukums</td>
          <td>Valsts</td>
          <td>Pilsēta</td>
          <td>Iela</td>
          <td colspan="2">Darbības</td>
        </tr>
    </thead>
    <tbody>
        @foreach($vietas as $vieta)
        <tr>
            <td>{{$vieta->id}}</td>
            <td>{{$vieta->nosaukums}}</td>
            <td>{{$vieta->valsts}}</td>
            <td>{{$vieta->pilseta}}</td>
            <td>{{$vieta->iela}}</td>
            <td><a href="{{ route('vietas.edit',$vieta->id)}}" class="btn btn-primary">LABOT</a></td>
            <td>
                <form action="{{ route('vietas.destroy', $vieta->id)}}" method="post">
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