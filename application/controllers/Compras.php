<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {


	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$cursos = $this->curso->all();

		foreach ($cursos as $key => $curso) {
			$cursos[$key]->preco = $this->preco->get(array('cd_curso' => $curso->id));
		}
		//print_r($cursos);die();
		$this->load->view('compras' , array('cursos' => $cursos));
	}
}