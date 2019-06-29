<?php
class Preco_curso_model extends Super_model {

    public function __construct(){

        parent::__construct();
        $this->table        = 'preco_curso';
        $this->primary_key  = 'id';

    }  
    
}