<?php
class Aluno_curso_model extends Super_model {

    public function __construct(){

        parent::__construct();
        $this->table        = 'aluno_curso';
        $this->primary_key  = 'id';

    }  
    
}