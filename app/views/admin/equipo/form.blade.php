@extends ('admin/layout2')

<?php

    if ($equipo->exists):
        $form_data = array('route' => array('admin.equipo.update', $equipo->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'admin.equipo.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@section ('title') Crear Equipo @stop

@section ('content')

<h1>Crear Equipo</h1>


  

{{ Form::model($equipo, $form_data , array('role' => 'form')) }}

@include ('admin/errors', array('errors' => $errors))

  <div class="row">
    
    <div class="form-group col-md-4">
      {{ Form::label('nombreEquipo', 'Nombre Equipo') }}
      {{ Form::text('nombreEquipo', null, array('placeholder' => 'Introduce el nombre del Equipo', 'class' => 'form-control')) }}        
    </div>    
    <div class="form-group col-md-4">
      {{Form::label('delegado', 'Delegado')}}
      {{Form::text('delegado', Input::old('delegado'), array('class'=>'form-control', 'placeholder'=>'Delegado', 'autocomplete'=>'off','id' => 'datepicker'))}}
    </div>    
    <div class="form-group col-md-4">
      {{Form::label('telefono', 'Telefono')}}
      {{Form::text('telefono', Input::old('telefono'), array('class'=>'form-control', 'placeholder'=>'telefono', 'autocomplete'=>'off'))}}
    </div>
    <div class="form-group col-md-4">

    {{ Form::hidden('torneo_id', $torneo_id) }}      
         

  </div>

  {{ Form::button($action , array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop