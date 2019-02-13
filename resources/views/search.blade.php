@extends('layouts.app')
<?php use App\ocena; 
$ocena = ocena::all();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@section('content')

<div class="container">
    @if(isset($details))
        <p> Wyniki dla szukanego słowa:  <b> {{ $query }} </b></p>
    <table class="table table-striped">
        <thead>
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
        </thead>
        <tbody>
             @foreach($details as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->imie}}</td>
                <td>{{$student->nazwisko}}</td>
                <td>{{$student->data_urodzenia}}</td>
                <td>{{$student->wiek}}</td>
                <td>{{$student->klasa}}</td>
                <td>{{$student->plec}}</td>
                <td>{{$student->ocena}}</td>
                <td>{{$student->pesel}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif(isset($message))
    <p>{{$message}}</p>
    @endif
    
</div>
@endsection