<?php
class Videos_model extends Super_model {

    public function __construct(){

        parent::__construct();
        $this->table        = 'videos';
        $this->primary_key  = 'id';

    }  
    
}