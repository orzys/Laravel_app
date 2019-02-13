@extends('layouts.app')
<?php use App\ocena; 
$ocena = ocena::all();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@section('content')
<form class="form-horizontal" action="{{ action('adminController@storeUpdateStudent', $student->id ) }}" method="put">
<div class="container center_div">
    {{ csrf_field() }}
    <input class="form-control" type="text" name="studentImie" placeholder="Imie" value="{{ $student->imie }}">
    <input class="form-control" type="text" name="studentNazwisko" placeholder="Nazwisko" value="{{ $student->nazwisko }}">
    <input class="form-control" type="text" name="studentDataUrodzenia" placeholder="Data urodzenia" value="{{ $student->data_urodzenia }}">
    <input class="form-control" type="text" name="studentWiek" placeholder="Wiek" value="{{ $student->wiek }}">
    <input class="form-control" type="text" name="studentKlasa" placeholder="Klasa" value="{{ $student->klasa }}">
    <input class="form-control" type="radio" name="studentPlec" value="1" placeholder="kobieta">kobieta
    <input class="form-control" type="radio" name="studentPlec" value="0" placeholder="mezczyzna">mezczyzna
    <select class="form-control" type="text" name="studentOcena" placeholder="Ocena">
    @foreach($ocena as $o)
    <option value="{{ $o->id }}"> {{$o->nazwa}} </option>
    @endForeach
    </select>
    <input class="form-control" type="text" name="studentPesel" placeholder="Pesel" value="{{ $student->pesel }}">
    <input class="btn btn-default" type="submit" value="Aktualizuj studenta">
    </div>
</form>
@endsection