<div clas="form-group">
    {{Form::label ('name','Nombre')}}
    {{Form::text ('name',null,['class'=>'form-control'])}}
    {{Form::label ('apellido','apellido')}}
    {{Form::text ('apellido',null,['class'=>'form-control'])}}
</div>
<br>
<div clas="form-group">
    {{Form::label ('avatar','avatar')}}
    {{Form::file ('avatar')}}
</div>