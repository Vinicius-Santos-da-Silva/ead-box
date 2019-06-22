<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct(){
		parent::__construct();    
	}

	public function index(){

		//print_r($this->session);die();

		if ($this->aluno->isLogged()) {
			$cursos = $this->aluno->loadCursos();
		//print_r($cursos);die();
			$this->load->view('home' , $cursos);
		}else{
			$this->load->view('login');
		}
	}

}