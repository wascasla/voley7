<?php 
class Partido extends Eloquent { //Todos los modelos deben extender la clase Eloquent
    protected $table = 'partido';

    protected $fillable = array("fechaPartido","horaPartido","datosPartido","fecha_id","equipoLocal","equipoVisitante","golEquipoLocal","golEquipoVisitante","cargado");

    //un partido pertenece a una fecha
    public function fecha()
    {
        return $this->belongsTo('Fecha');
    }

    public function equipoLocal()
    {
        return $this->belongsTo('equipo','equipoLocal');//c_id - customer id
    }
    public function equipoVisitante()
    {
        return $this->belongsTo('equipo','equipoVisitante');//s_id - staff id
    }


    public static function agregarPartido($input){

        $respuesta = array();

        $reglas =  array(
            'fecha_id'  => 'required',              
            //'nombre' => array('required', 'max:255'),
            'equipoLocal'  => 'required',
            'equipoVisitante'  => 'required',
        );

        $validator = Validator::make($input, $reglas);

        if ($validator->fails()){
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{

            $partido = static::create($input);

            $respuesta['mensaje'] = 'Partido creado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $partido;
        }

        return $respuesta; 
    }


    public $errors;

    //metodos para validar y guardar el partido
     public function isValid($data)
    {
        $rules = array(
            'fechaPartido'=> 'required',
            'fecha_id' => 'required'
            
            
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

    public function validAndSave($data)
    {
        // Revisamos si la data es válida
        if ($this->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $this->fill($data);
            // Guardamos la fecha
            $this->save();
            
            return true;
        }
        
        return false;
    }

}
?>