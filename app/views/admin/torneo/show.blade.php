@extends ('admin/layout2')

@section ('title') Torneo {{ $torneo->nombreTorneo }} @stop

@section ('content')

<h2>Torneo #{{ $torneo->id }}</h2>

<p>nombreTorneo: {{ $torneo->nombreTorneo }}</p>
<p>fechaInicio: {{ $torneo->fechaInicio }}</p>

<p>
  <a href="{{ route('admin.torneo.edit', $torneo->id) }}" class="btn btn-primary">
    Editar
  </a>    
</p>

<p>
    <a href="{{ route('admin.torneo.index') }}" class="btn btn-info">Lista de Torneos</a>
  </p>
  


<h2>Lista de Equipos</h2>
  <table class="table table-striped">
    <tr>
        <th>Equipo</th>
        <th>Delegado</th>
        <th>Telefono</th>
        
        <th>Acciones</th>
    </tr>
    @foreach ($equipos as $equipo)
    <tr>
        <td>{{ $equipo->nombreEquipo }}</td>
        <td>{{ $equipo->delegado }}</td>
        <td>{{ $equipo->telefono }}</td>
        
        <td>
          <a href="{{ route('admin.torneo.show', $torneo->id) }}" class="btn btn-info">
              Ver
          </a>
          <a href="{{ route('admin.torneo.edit', $torneo->id) }}" class="btn btn-primary">
            Editar
          </a>
           <a href="#" data-id="{{ $torneo->id }}" class="btn btn-danger btn-delete">
              Eliminar
          </a>
        </td>
    </tr>
    @endforeach
  </table>



  <p>
    <a href="{{ route('crearEquipo',array($torneo->id)) }}" class="btn btn-info">Agregar Equipo</a>
  </p>
  

{{ Form::model($torneo, array('route' => array('admin.torneo.destroy', $torneo->id), 'method' => 'DELETE'), array('role' => 'form')) }}
  {{ Form::submit('Eliminar torneo', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}




<h2>Lista de Fechas</h2>
  <table class="table table-striped">
    <tr>
        <th>nombre</th>
        <th>datosJornada</th>
        <th>torneo_id</th>
        <th>cargado</th>
        
        <th>Acciones</th>
    </tr>
    @foreach ($fechas as $fecha)
    <tr>
        <td>{{ $fecha->nombre }}</td>
        <td>{{ $fecha->datosJornada }}</td>
        <td>{{ $fecha->torneo_id }}</td>
        <td>{{ $fecha->cargado }}</td>
        
        <td>
          <a href="{{ route('admin.fecha.show', $fecha->id) }}" class="btn btn-info">
              Ver
          </a>
          <a href="{{ route('admin.fecha.edit', $fecha->id) }}" class="btn btn-primary">
            Editar
          </a>
           <a href="#" data-id="{{ $fecha->id }}" class="btn btn-danger btn-delete">
              Eliminar
          </a>
        </td>
    </tr>
    @endforeach
  </table>


  <p>
    <a href="{{ route('crearFecha',array($torneo->id)) }}" class="btn btn-info">Agregar Fecha</a>
  </p>

  @if( Session::has('modal_message_error'))
    <script type="text/javascript">
      $('.top-left').notify({
        message: { text: 'Aw yeah, It works!' }
      }).show(); 
    </script>
  @endif

  

  @if( Session::has('modal_message_error'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myModal').show();
        });
    </script>
    <div id="popupmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Notification: Please read</h3>
        </div>
        <div class="modal-body">
            <p>
                {{ Session::get('modal_message_error') }}
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
@endif

<div class="container">
  <h2>Small Modal</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

@stop