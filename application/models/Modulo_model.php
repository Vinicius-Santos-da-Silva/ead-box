<?php
class Modulo_model extends Super_model {

    public function __construct(){

        parent::__construct();
        $this->table        = 'modulos';
        $this->primary_key  = 'id';

    }  
    
}