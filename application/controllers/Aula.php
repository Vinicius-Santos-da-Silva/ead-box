<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula extends CI_Controller {


	public function __construct(){
		parent::__construct();    
	}

	public function visualizar($cd_aula){

		if ($this->aluno->isLogged()) {
			
			$aula = $this->aula->get($cd_aula);
			$aula->video = $this->video->get($aula->id);
			$curso = $this->curso->get($aula->cd_curso);

			$comentarios = $this->duvida->filter(array('cd_aula' => $aula->id) , $limit = 0, $offset = 0, $orderby = 'datahora_cadastro DESC');

			foreach ($comentarios as $key => $comentario) {
				$comentarios[$key]->usuario = $this->aluno->get($comentario->cd_aluno);
			}

			//print_r($aula);die();
			$this->load->view('aula', array('aula' => $aula , 'curso' => $curso->nome , 'comentarios' => $comentarios));
		}
	}

}