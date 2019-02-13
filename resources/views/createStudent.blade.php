@extends('layouts.app')
<?php use App\ocena; 
$ocena = ocena::all();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@section('content')
<form class="form-horizontal" action="{{ action('adminController@storeStudent') }}" method="post">
<div class="container center_div">
{{ csrf_field() }}
    <input pattern="[a-z0-9ąćęłńóśżź]{3,20}" required title="(3-19 liter)" class="form-control" type="text" name="studentImie" placeholder="Imie">
    <input class="form-control" type="text" name="studentNazwisko" placeholder="Nazwisko">
    <input class="form-control" type="text" name="studentDataUrodzenia" placeholder="Data urodzenia">
    <input class="form-control" type="text" name="studentWiek" placeholder="Wiek">
    <input class="form-control" type="text" name="studentKlasa" placeholder="Klasa">
    <label class="control-label col-sm-2" for="studentPlec">Kobieta:</label>
    <input class="form-control" type="radio" name="studentPlec" value="1" placeholder="kobieta">
    <label class="control-label col-sm-2" for="studentPlec">Mężczyzna:</label>
    <input class="form-control" type="radio" name="studentPlec" value="0" placeholder="mezczyzna">
    <select class="form-control" type="text" name="studentOcena" placeholder="Ocena">
    @foreach($ocena as $o)
    <option value="{{ $o->id }}"> {{$o->nazwa}} </option>
    @endForeach
    </select>
    <input class="form-control" type="text" name="studentPesel" placeholder="Pesel">
    <input class="btn btn-success" type="submit" value="Dodaj studenta">
    <a href="/">
    <div class="text-center">
    <button type="button" class="btn btn-default">Powrót</button>
    </div>
</div>
</form>
@endsection