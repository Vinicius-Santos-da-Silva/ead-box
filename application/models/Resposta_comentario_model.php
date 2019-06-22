<?php
class Resposta_comentario_model extends Super_model {

    public function __construct(){

        parent::__construct();
        $this->table        = 'resposta_comentario';
        $this->primary_key  = 'id';

    }  
    
}