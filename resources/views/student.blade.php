@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

@section('content')
@if(session()->has('message'))

    <div class="alert alert-success" style="text-align: center; width:70%; margin-left:15%">
  <!-- <script>confirm("Press a button!");</script> -->
        {{ session()->get('message') }}
    </div>
@endif
<div style="text-align: center; width:70%; margin-left:15%">
<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Szukaj studenta"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default" value="Szukaj">Szukaj</button>
        </span>
    </div>
</form>
</div>
<table align="center" class="table table-hover" style="width: 70%">
<tr>
<th>ID</th>
<th>Imię</th>
<th>Nazwisko</th>
<th>Data urodzenia</th>
<th>Wiek</th>
<th>Klasa</th>
<th>Płeć</th>
<th>Ocena</th>
<th>Pesel</th>
</tr>
<tbody>
@foreach($student as $s)
<tr>
<th>{{ $s->id }}</th>
<th>{{ $s->imie }}</th>
<th>{{ $s->nazwisko }}</th>
<th>{{ $s->data_urodzenia }}</th>
<th>{{ $s->wiek }}</th>
<th>{{ $s->klasa }}</th>
<th>{{ $s->plec }}</th>
<th>{{ $s->ocena }}</th>
<th>{{ $s->pesel }}</th>
@if (Route::has('login'))
@auth
<th><a href="{{ route('updateStudent', $s->id) }}">
<button type="button" class="btn btn-success">Edytuj</button>
<th><a onclick="return confirm('Jesteś pewny, że chcesz usunąć tego studenta?');" href="{{ route('deleteStudent', $s->id) }}">
<button type="button" class="btn btn-danger">Usuń</button>
@endif
@endauth

</tr>
@endforeach
</tbody>
</table>
</div>
<th><a href="/">
<div class="text-center">
<button type="button" class="btn btn-default">Strona główna</button>
</div>
<br>
@if (Route::has('login'))
@auth
<a href="/addStudent">
<div class="text-center">
<button type="button" class="btn btn-success">Dodaj nowego studenta</button>
</div>
@endif
@endauth
@endsection
