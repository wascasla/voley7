@extends ('admin/layout2')

<?php

    if ($fecha->exists):
        $form_data = array('route' => array('admin.fecha.update', $fecha->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'admin.fecha.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@section ('title') Crear fecha @stop

@section ('content')

<h1>Crear fecha</h1>


  

{{ Form::model($fecha, $form_data , array('role' => 'form')) }}

@include ('admin/errors', array('errors' => $errors))

  <div class="row">
    
    <div class="form-group col-md-4">
      {{ Form::label('nombre', 'Nombre Fecha') }}
      {{ Form::text('nombre', null, array('placeholder' => 'Introduce el nombre de la Fecha', 'class' => 'form-control')) }}        
    </div>    
    <div class="form-group col-md-4">
      {{Form::label('datosJornada', 'datosJornada')}}
      {{Form::text('datosJornada', Input::old('datosJornada'), array('class'=>'form-control', 'placeholder'=>'datosJornada', 'autocomplete'=>'off','id' => 'datepicker'))}}
    </div>      
    <div class="form-group col-md-4">

    {{ Form::hidden('torneo_id', $torneo_id) }} 
      
        

  </div>

  {{ Form::button($action , array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop