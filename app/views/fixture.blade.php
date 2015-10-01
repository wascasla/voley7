@extends('plantilla')


@section('title') 
	Fixture
@stop


@section('imagen-titulo') 
{{ HTML::image('assets/media/titulos/img_tit_fixture.jpg', 'Torneo',array('class' => 'img-responsive','width' => '178', 'height' => '75') )}}
@stop

@section('content') 

    

    <h1>Fechas</h1>

    
        <table  class="table table-bordered letraBlanca">
        
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Dia</th>
                <th>Local</th>
                <th>Set</th>
                <th>Set</th>
                <th>Visitante</th>
                
                
            </tr>
        </thead>
        <tbody>
            @foreach ($fixture as $fix)
            
                <tr>
                    <td>{{ $fix->nombre }}</td>
                    <td>{{date('d-m-Y', strtotime( $fix->fechaPartido)) }}</td>
                    <td>{{ $fix->nombreEquipo }}</td>
                    <td>{{ $fix->golEquipoLocal }}</td>
                    <td>{{ $fix->golEquipoVisitante }}</td>
                    <td>{{ $fix->visitante }}</td>
                   
                    
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    

    
        <BR>
        <BR>
        <BR>                      
@stop