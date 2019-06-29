<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct(){
		parent::__construct();

	}

	public function index(){
		$this->load->view('login');
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

	public function cadastro(){

		$this->load->view('singup');

	}

	public function singup(){

		$username = $this->input->post('username');
		$email = $this->input->post('email');		
		$senha = $this->input->post('senha');
		$senha_rpt = $this->input->post('senha-rpt');


		$aluno_login = $this->aluno->get(array('email' => $email));

		if ($aluno_login) {

			$this->aluno->setAlunoSession($aluno_login);

			header('location:'.base_url('login'));

		}else{
			$aluno = $this->aluno->add(array('nome' => $username , 'email' => $email , 'senha' => md5($senha)));

			$this->load->view('login');
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		header('location:'.base_url('login'));
	}
}