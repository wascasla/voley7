@extends('plantilla')


@section('title') 
	Posiciones
@stop


@section('imagen-titulo') 
{{ HTML::image('assets/media/titulos/img_tit_posiciones.jpg', 'Torneo',array('class' => 'img-responsive','width' => '178', 'height' => '75') )}}
@stop

@section('content') 

    

    <h1>{{$torneo->nombreTorneo}}</h1>

    <table  class="table table-bordered letraBlanca">
        
        <thead>
            <tr>
                <th>POS</th>
                <th>EQUIPO</th>
                <th>PJ</th>
                <th>PG</th>
                <th>PP</th>
                <th>PN</th>
                <th>PTOS</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $equipo)
            
                <tr>
                    <td>{{ $var++ }}</td>
                    <td>{{ $equipo->nombreEquipo }}</td>
                    <td>{{ $equipo->pj }}</td>
                    <td>{{ $equipo->pg }}</td>
                    <td>{{ $equipo->pp }}</td>
                    <td>{{ $equipo->pe }}</td>
                    <td>{{ $equipo->puntos }}</td>
                    
                    
                </tr>
            @endforeach
        </tbody>
    </table>
                              
@stop