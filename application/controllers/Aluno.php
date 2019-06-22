<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {


	public function __construct(){
		parent::__construct();

	}

	public function login(){

		$email = $this->input->post('email');
		
		$senha = $this->input->post('senha');

		$aluno_login = $this->aluno->get(array('email' => $email, 'senha' => md5($senha)));

		if ($aluno_login) {

			$this->aluno->setAlunoSession($aluno_login);

			header('location:'.BASE);

		}else{
			$this->load->view('login');
		}

	}
}