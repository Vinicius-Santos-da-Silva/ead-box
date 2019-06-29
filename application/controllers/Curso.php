<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if (!$this->aluno->isLogged()) {
			header('location:'.base_url(''));
		}
	}

	public function aulas($id_curso){
		if (!$this->aluno->isLogged()) {
			header('location:'.base_url('login'));
		}

		$curso = $this->curso->get($id_curso);
		
		if (!$curso) {
			header('location:'.base_url(''));
		}

		$aulas_curso = $this->aula->filter(array('cd_curso' => $curso->id));

		foreach ($aulas_curso as $key => $aula) {
			$aulas_curso[$key]->video = $this->video->get(array('cd_aula' => $aula->id));
		}

		//print_r($aulas_curso);die();

		$this->load->view('curso', array('aulas' => $aulas_curso , 'curso' => $curso));
	}

	public function comprar($id_curso){
		$curso = $this->curso->get($id_curso);

		if (!$curso) {
			$this->load->view('error/error_404');
			return;
		}

		$curso->custo = $this->preco->get(array('cd_curso'=>$curso->id));

		$this->paypal->setCheckout($curso);
	}

}