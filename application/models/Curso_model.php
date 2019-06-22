<?php
class Curso_model extends Super_model {

    public function __construct(){

        parent::__construct();
        $this->table        = 'cursos';
        $this->primary_key  = 'id';

    }  

    public function cancelar($id){

    	$this->update(array('datahora_cancelamento' => date('Y-d-m h:m:s')) , array('id'=>$id));
    	
    }
    
}