<?php
class Usuario_model extends Super_model {

    public function __construct(){

        parent::__construct();
        $this->table        = 'usuarios';
        $this->primary_key  = 'id';

    }  
    
}