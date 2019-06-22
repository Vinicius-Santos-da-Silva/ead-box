<?php
class Questionario_model extends Super_model {

    public function __construct(){

        parent::__construct();
        $this->table        = 'questionarios';
        $this->primary_key  = 'id';

    }  
    
}