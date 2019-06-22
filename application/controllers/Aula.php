<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula extends CI_Controller {


	public function __construct(){
		parent::__construct();    
	}

	public function visualizar($cd_aula){

		if ($this->aluno->isLogged()) {
			
			$usuario = $this->session->userdata('aluno');

			$aula = $this->aula->get($cd_aula);
			$aula->video = $this->video->get($aula->id);
			$curso = $this->curso->get($aula->cd_curso);
			
			$comentarios = $this->duvida->filter(array('cd_aula' => $aula->id) , $limit = 0,$offset = 0, $orderby = 'datahora_cadastro DESC');

			$autor = $this->usuario->get($aula->cd_autor);

			foreach ($comentarios as $key => $comentario) {

				$comentarios[$key]->respostas = $this->resposta_comentario->filter(array('cd_comentario' => $comentario->id));

				foreach ($comentarios[$key]->respostas as $key_comment => $resposta) {
					$comentarios[$key]->respostas[$key_comment]->usuario = $this->usuario->get($resposta->cd_autor);
				}

				$comentarios[$key]->usuario = $this->aluno->get($comentario->cd_aluno);
			}

			$date = new DateTime($aula->datahora_cadastro);
			$aula->datahora_cadastro = $date->format('d/m/Y H:i:s');

			//print_r($usuario);die();
			
			$this->load->view('aula', array('aula' => $aula , 'curso' => $curso , 'comentarios' => $comentarios , 'autor' => $autor , 'usuario' => $usuario));
		}
	}

}