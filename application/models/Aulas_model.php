<?php
class Aulas_model extends Super_model {

    public function __construct(){

        parent::__construct();
        $this->table        = 'aulas';
        $this->primary_key  = 'id';

    }  
    
}