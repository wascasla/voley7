@extends ('admin/layout2')

<?php

    if ($torneo->exists):
        $form_data = array('route' => array('admin.torneo.update', $torneo->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'admin.torneo.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@section ('title') Crear Torneos @stop

@section ('content')

<h1>Crear Torneos</h1>

<p>
    <a href="{{ route('admin.torneo.index') }}" class="btn btn-info">Lista de Torneos</a>
  </p>
  

{{ Form::model($torneo, $form_data , array('role' => 'form')) }}

@include ('admin/errors', array('errors' => $errors))

  <div class="row">
    
    <div class="form-group col-md-4">
      {{ Form::label('nombreTorneo', 'Nombre Torneo') }}
      {{ Form::text('nombreTorneo', null, array('placeholder' => 'Introduce el nombre del Torneo', 'class' => 'form-control')) }}        
    </div>    
    <div class="form-group col-md-4">
      {{Form::label('fechaRegistro', 'Fecha de Registro')}}
      {{Form::input('date','fechaRegistro', Input::old('fechaRegistro'), array('class'=>'form-control', 'placeholder'=>'fecha de Registro', 'autocomplete'=>'off'))}}
    </div>
    <div class="form-group col-md-4">
      {{Form::label('fechaInicio', 'Fecha de Inicio del Torneo')}}
      {{Form::input('date','fechaInicio', Input::old('fechaInicio'), array('class'=>'form-control', 'placeholder'=>'Fecha Inicio  del torneo', 'autocomplete'=>'off'))}}
    </div>
    <div class="form-group col-md-4">
      {{Form::label('direccion', 'Direccion')}}
      {{Form::text('direccion', Input::old('direccion'), array('class'=>'form-control', 'placeholder'=>'direccion', 'autocomplete'=>'off'))}}
    </div>
    <div class="form-group col-md-4">
      {{Form::label('ptoGanar', 'Puntos por Ganar')}}
      {{Form::number('ptoGanar', Input::old('ptoGanar'), array('class'=>'form-control', 'placeholder'=>'Puntos por ganar', 'autocomplete'=>'off'))}}
    </div>
    <div class="form-group col-md-4">
      {{Form::label('ptoPerder', 'Puntos por perder')}}
      {{Form::number('ptoPerder', Input::old('ptoPerder'), array('class'=>'form-control', 'placeholder'=>'Puntos por perder', 'autocomplete'=>'off'))}}
    </div>
    <div class="form-group col-md-4">
      {{Form::label('ptoEmpatar', 'Puntos por no presentarse')}}
      {{Form::number('ptoEmpatar', Input::old('ptoEmpatar'), array('class'=>'form-control', 'placeholder'=>'Puntos por no presentarse', 'autocomplete'=>'off'))}}
    </div>

    

  </div>

  {{ Form::button($action , array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop