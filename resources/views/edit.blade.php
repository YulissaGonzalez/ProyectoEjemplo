<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
@vite('resources/css/app.css')
@extends('layouts.app')
@section('title','Trainers Edit')
@section('content')

{!!Form::model($trainer,['route'=>['trainers.update',$trainer], 'method'=>'PUT','files'=>true])!!}
      <div class="form-group">
        @include ("form")
        <br>
    </div>
    {{Form::submit('Actualizar',['class'=>'btn btn-primary'])}}
@endsection