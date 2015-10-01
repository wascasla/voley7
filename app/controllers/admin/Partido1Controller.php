<?php

class Partido1Controller extends \BaseController {


	protected $id_fecha;
	protected $id_torneo;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$partidos = Partido::all();


		return View::make('partidos.index')
			->with('partidos',$partidos);

		$torneos =Torneo::All();
		return View::make('admin/torneo/list')->with('torneos', $torneos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//$id_fecha1=this->id_fecha;
		//aqui quede
		$partido = new Partido;
		//$equipos = Equipo::all();
		$equipos = Equipo::where('torneo_id','=',$this->id_torneo)
			->select('nombreEquipo','id')
			->get();
		$fecha_id=$this->id_fecha;

		//$equipos = Equipo::lists('nombreEquipo', 'id');

		return View::make('admin.partido.form', array('partido' => $partido,'equipos' => $equipos
			,'fecha_id'=>$this->id_fecha));

		//return View::make('admin.partido.form',compact('equipos','partido','fecha_id'));
	}

	//'equipos' => $equipos

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $partido = new Partido;

        //$partido->fecha_id = $this->id_fecha;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();

        $equipos = Equipo::where('torneo_id','=',$this->id_torneo)
			->select('nombreEquipo','id')
			->get();


        
        // Revisamos si la data es válido
        if ($partido->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $partido->fill($data);

            
            // Guardamos el usuario
            $partido->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.fecha.show', array($partido->fecha_id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('admin.partido.create')->withInput()->withErrors($partido->errors);
			//->with('equipos', $equipos);				
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
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$partido = Partido::find($id);
		if (is_null ($partido))
		{
			App::abort(404);
		}

		$equipos = Equipo::where('torneo_id','=',$this->id_torneo)->get();

		//return View::make('admin.partido.form')->with('partido', $partido);

		return View::make('admin.partido.form', array('partido' => $partido,'equipos' => $equipos
			,'fecha_id'=>$this->id_fecha));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        //$torneo = Torneo::find($id);
        if ($partido->validAndSave($data))
        {
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.fecha.show', array($partido->fecha_id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('admin.partido.edit', $partido->id)->withInput()->withErrors($partido->errors);
        }
	}
	


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	/*
	public function update($id)
	{
		//
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'nerd_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('partidos/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $nerd = Partido::find($id);
            $nerd->name       = Input::get('name');
            $nerd->email      = Input::get('email');
            $nerd->nerd_level = Input::get('nerd_level');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('partidos');
        }
	}
	*/

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


	public function crearPartido($idFecha,$idTorneo)
	{
		//$this->variable = $whatever;
		$this->id_torneo = $idTorneo;
		$this->id_fecha = $idFecha;
		return $this->create();
	}


	
}
