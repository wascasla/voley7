<?php
class Socio extends Eloquent {
   protected $table = 'socios';

   protected $fillable = array("nombreEquipo","delegado","telefono","torneo_id");
}
?>