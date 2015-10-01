<?php

class FechaController extends \BaseController {

	protected $id_torneo;


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$fecha = new Fecha;
		//$torneos = Torneo::All();
		$torneo_id=$this->id_torneo;
      	return View::make('admin/fecha/form',array('torneo_id'=>$torneo_id,'fecha'=>$fecha));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 // Creamos un nuevo objeto para nuestro nuevo usuario
        $fecha = new Fecha;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();

        
        
        // Revisamos si la data es válido
        if ($fecha->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $fecha->fill($data);
            // Guardamos el usuario
            $fecha->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.torneo.show', array($fecha->torneo_id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('admin.fecha.create')->withInput()->withErrors($fecha->errors);
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$fecha = Fecha::find($id);
        
        if (is_null($fecha)) App::abort(404);

         //$partidos = DB::table('partido')->where('fecha_id','=', $id)->get();

        $partidos = DB::table('partido')
        	->leftJoin('equipo','partido.equipoLocal','=','equipo.id')
        	->where('partido.fecha_id','=', $id)
        	->select('partido.id','partido.fechaPartido','partido.horaPartido','partido.datosPartido',
        		'partido.fecha_id','partido.equipoLocal','partido.equipoVisitante','partido.golEquipoLocal',
        		'partido.golEquipoVisitante','partido.cargado','equipo.nombreEquipo')
        	->get();
         //$fechas = DB::table('fecha')->where('torneo_id','=', $id)->get();
        	
        
      	return View::make('admin/fecha/show', array('fecha' => $fecha, 'partidos'=>$partidos));

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function crearFecha($idTorneo)
	{

		//$equipos = Equipo::where('torneo_id','=',$idTorneo)
		//	->select('id')
		//	->get();

		if (Equipo::where('torneo_id', '=', $idTorneo)->exists()) {
  			 //$this->variable = $whatever;
			$this->id_torneo = $idTorneo;
			//$this->id_fecha = $idFecha;
			return $this->create();
		}else{
			Session::flash('modal_message_error', 'You must be logged in to view this page.');
			return Redirect::route('admin.torneo.show', array($idTorneo));
			//->with(Session::flash('modal_message_error', 'You must be logged in to view this page.'));
		}

		
		
	}

}
