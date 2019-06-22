<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller {


	public function __construct(){
		parent::__construct();
	}

	public function aulas($id_curso){

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

}