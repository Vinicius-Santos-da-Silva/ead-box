<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentario extends CI_Controller {


	public function __construct(){
		parent::__construct();
		
	}

	public function index(){

		if (!$this->aluno->isLogged()) {
			return;
		}

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

	public function resposta(){

		$cd_autor = $this->input->post('cd_autor');
		$cd_comentario = $this->input->post('cd_comentario');
		$resposta  = $this->input->post('resposta');
		
		$usuario = $this->session->userdata('aluno');

		$nova_resposta = array(
			'cd_autor' => $cd_autor,
			'cd_comentario' => $cd_comentario,
			'resposta' => $resposta,
		);

		$insert_resposta = $this->resposta_comentario->add($nova_resposta);

		$resposta = $this->resposta_comentario->get($insert_resposta);

		$resposta->usuario = $this->aluno->get($resposta->cd_autor);

		$this->output
	        ->set_content_type('application/json')
    	    ->set_output(json_encode($resposta));







	}
}