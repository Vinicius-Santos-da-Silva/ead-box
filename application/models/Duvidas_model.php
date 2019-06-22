<?php
class Duvidas_model extends Super_model {

    public function __construct(){

        parent::__construct();
        $this->table        = 'duvidas';
        $this->primary_key  = 'id';

    }  
    
}