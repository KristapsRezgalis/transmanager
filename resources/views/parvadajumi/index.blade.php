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

  <a href="/parvadajumi/create" class="btn btn-primary" role="button">VEIDOT JAUNU PĀRVADĀJUMU</a>
  <br><br><br>

  <table class="table table-bordered table-hover table table-sm"  >
    <thead>
        <tr align="center" style="font-weight:bold" class="table-info">
          <td>ID</td>
          <td>IEKRAUŠANAS DATUMS</td>
          <td>IZKRAUŠANAS DATUMS</td>
          <td>IEKRAUŠANAS LAIKS</td>
          <td>IZKRAUŠANAS LAIKS</td>
          <td>IEKRAUŠANAS VIETA</td>
          <td>IZKRAUŠANAS VIETA</td>
          <td>KLIENTS</td>
          <td>PĀRVADĀTĀJS</td>
          <td>IEŅĒMUMI</td>
          <td>IZDEVUMI</td>
          <td>PEĻŅA</td>
          <td>TRANSPORTA NUMURI</td>
          <td colspan="3" >DARBĪBAS</td>
        </tr>
    </thead>
    <tbody align="center">
        @foreach($parvadajumi as $parvadajums)
        <tr>
            <td>{{$parvadajums->id}}</td>
            <td>{{$parvadajums->iekrausanas_datums}}</td>
            <td>{{$parvadajums->izkrausanas_datums}}</td>
            <td>{{$parvadajums->iekrausanas_laiks}}</td>
            <td>{{$parvadajums->izkrausanas_laiks}}</td>
            <td>{{$parvadajums->vieta->nosaukums}}</td>
            <td>{{$parvadajums->vieta2->nosaukums}}</td>
            <td>{{$parvadajums->kompanija->nosaukums}}</td>
            <td>{{$parvadajums->kompanija2->nosaukums}}</td>
            <td>{{$parvadajums->ienemumi}}</td>
            <td>{{$parvadajums->izmaksas}}</td>
            <td>{{$parvadajums->pelna}}</td>
            <td>{{$parvadajums->transporta_numuri}}</td>
            <td><a href="{{ route('parvadajumi.edit',$parvadajums->id)}}" class="btn btn-primary">LABOT</a></td>
            <td>
                <form action=" {{ route('parvadajumi.destroy', $parvadajums->id) }}" method="post">

                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">DZĒST</button>
                </form>
            </td>
            <td><button class="btn btn-secondary" onclick=" window.open('https://maps.google.com/maps?saddr={{$parvadajums->vieta->latitude}},{{$parvadajums->vieta->longitude}}&daddr={{$parvadajums->vieta2->latitude}},{{$parvadajums->vieta2->longitude}}','_blank')">MARŠRUTS</button></td>

        </tr>
        @endforeach

    </tbody>
  </table>
<div>
@endsection