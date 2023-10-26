<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
@vite('resources/css/app.css')

@section('title','Trainers Create')
@section('content')
@extends ('layouts.app')
{!!Form::open (['route'=>'trainers.store', 'method'=>'POST', 'files'=>'true'])!!}
        @include ("form")
        <br>
        {{Form::submit('guardar',['class'=>'btn btn-primary'])}}
        {!!Form::close()!!}
@endsection
