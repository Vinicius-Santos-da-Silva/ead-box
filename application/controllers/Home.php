<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct(){
		parent::__construct();    

	}

	public function index(){
		//print_r($this->session);die();
		if (!$this->aluno->isLogged()) {
			header('location:'.base_url('login'));
		}
		
		$cursos = $this->aluno->loadCursos();

		$this->load->view('home' , $cursos);


	}

}