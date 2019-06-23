<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {


	public function __construct(){
		parent::__construct();    
	}

	public function error(){

		$this->load->view('error_payment');

	}

	public function success(){
		$token = $this->input->get('token');
		$cd_curso = $this->input->get('cd_curso');
		$transacao = $this->paypal->getCheckoutDetails($token);

		$aluno = $this->session->userdata('aluno');

		if ($transacao['ACK'] === 'Success') {
			
			$novo_curso_aluno = $this->aluno_curso->add(array('cd_aluno' => $aluno->id , 'cd_curso' => $cd_curso));	

			print_r('novo: '.$novo_curso_aluno);
		}

		$this->load->view('sucess_payment' , array('cd_curso'=>$cd_curso));



	}
}