@extends('layouts.app')
@section('title','Trainers')
@section ('content')

<div class="card text-center" style="width: 18rem; margin-top: 70px;">
  <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;"
  class="card-img-top rounded-circle mx-auto d-block"
  src="avatar/{{$trainer->avatar}}" alt="">
    <div class="card-body">
      <h5 class="card-title">{{$trainer ->name}}</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="/delete/{{$trainer->id}}" class="btn btn-primary">DELETE</a>
      <a href="/trainers/{{$trainer->id}}/edit" class="btn btn-secondary">EDITAR</a>
      <br>
      <br>
      <a href="{{route('listado.pdf')}}" class="btn btn-primary">Descargar Entrenadores en PDF</a>
    </div>

@endsection