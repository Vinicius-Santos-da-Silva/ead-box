<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {


	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
		
		$aluno = $this->session->userdata('aluno');

		$cursos_aluno_matricula = $this->aluno_curso->filter(array('cd_aluno' => $aluno->id));

		//print_r($cursos_aluno_matricula);die();
		
		$cursos = $this->curso->all();

		foreach ($cursos as $key => $curso) {

			foreach ($cursos_aluno_matricula as $k => $aluno_curso) {

				if ($aluno_curso->cd_curso === $curso->id) {
					unset($cursos[$key]);
				}
			}

		}

		foreach ($cursos as $key => $curso) {
	
			$cursos[$key]->preco = $this->preco->get(array('cd_curso' => $curso->id));

		}

		//print_r($cursos);die();
		$this->load->view('compras' , array('cursos' => $cursos));
	}
}