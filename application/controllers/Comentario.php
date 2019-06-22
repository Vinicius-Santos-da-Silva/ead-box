<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentario extends CI_Controller {


	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$cd_aula = $this->input->post('cdAula');

		$duvida  = $this->input->post('comentario');
		
		$usuario = $this->session->userdata('aluno');

		$comentario = array('cd_aula' => $cd_aula , 'cd_aluno' => $usuario->id , 'duvida' => $duvida);

		$novo_comentario = $this->duvida->add($comentario);

		$comentario = $this->duvida->get($novo_comentario);
		$comentario->usuario = $usuario->nome;

		$this->output
	        ->set_content_type('application/json')
    	    ->set_output(json_encode($comentario));

	}
}