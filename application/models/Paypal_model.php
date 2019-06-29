<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal_model extends Super_model {


	public function __construct(){
		parent::__construct();
		parent::__construct();
		$this->table        = 'paypal';
		$this->primary_key  = 'id';

		$this->user = 'vinicius.unisinos-facilitator_api1.hotmail.com';
		$this->pwd = '8JZQE8ZNHXWGET8J';
		$this->signature = 'AwTRcVM2afgmHXcOd-r1Rp0MwkHsAZkeRZzdaB1.HGKVUmGGVEyvD6Sg';
		$this->api_url = 'https://api-3t.sandbox.paypal.com/nvp';
		$this->valor = 290.00;

	}

	public function setCheckout($curso){

		//debug($curso,1);

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_URL, $this->api_url);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
			'USER' => $this->user,
			'PWD' => $this->pwd,
			'SIGNATURE' => $this->signature,

			'METHOD' => 'SetExpressCheckout',
			'VERSION' => '108',
			'LOCALECODE' => 'pt_BR',

			'PAYMENTREQUEST_0_AMT' => $curso->custo->preco,
			'PAYMENTREQUEST_0_CURRENCYCODE' => 'BRL',
			'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
			'PAYMENTREQUEST_0_ITEMAMT' => $curso->custo->preco,

			'L_PAYMENTREQUEST_0_NAME0' => $curso->nome,
			'L_PAYMENTREQUEST_0_DESC0' => 'Assinatura de '.$curso->nome,
			'L_PAYMENTREQUEST_0_QTY0' => 1,
			'L_PAYMENTREQUEST_0_AMT0' => $curso->custo->preco,

			'L_BILLINGTYPE0' => 'RecurringPayments',
			'L_BILLINGAGREEMENTDESCRIPTION0' => 'BXEad - Cursos á Distancia',

			'CANCELURL' => base_url('checkout/error'),
			'RETURNURL' => base_url('checkout/success?cd_curso='.$curso->id),

		    //'CANCELURL' => 'http://localhost/payout/checkout/cancel',
		    //'RETURNURL' => 'http://localhost/payout/checkout/getCheckoutDetails'
		)));

		$response =    curl_exec($curl);


		curl_close($curl);

		$nvp = array();

		if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
			foreach ($matches['name'] as $offset => $name) {
				$nvp[$name] = urldecode($matches['value'][$offset]);
			}
		}


		debug($nvp);


		if (isset($nvp['ACK']) && $nvp['ACK'] == 'Success') {
			$query = array(
				'cmd'    => '_express-checkout',
				'token'  => $nvp['TOKEN']
			);

			//debug($query);


			$redirectURL = sprintf('https://www.sandbox.paypal.com/cgi-bin/webscr?%s', http_build_query($query));
		    //$redirectURL = sprintf('https://www.paypal.com/cgi-bin/webscr?%s', http_build_query($query));

			header('Location: ' . $redirectURL);
		} else {
			debug($nvp,1);
		} 
	}




	public function getCheckoutDetails($token){

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
		curl_setopt($curl, CURLOPT_URL, $this->api_url);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
			'USER' => $this->user,
			'PWD' => $this->pwd,
			'SIGNATURE' => $this->signature,

			'METHOD' => 'GetExpressCheckoutDetails',
			'VERSION' => '108',

			'TOKEN' => $token
		)));



		$response =    curl_exec($curl);
		curl_close($curl);
		$nvp = array();

		if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
			foreach ($matches['name'] as $offset => $name) {
				$nvp[$name] = urldecode($matches['value'][$offset]);
			}
		}

		$this->saveTransation($nvp);

		return $nvp;

        //$this->form->returnoPaypal($nvp);
        //$this->createRecurringPay($nvp['TOKEN'], $nvp['PAYERID']);   
	}


	public function saveTransation($nvp){

		$aluno = $this->session->userdata('aluno');

		$firstname = $nvp['FIRSTNAME'];
		$email = $nvp['EMAIL'];
		$token = $nvp['TOKEN'];
		$payerid = $nvp['PAYERID'];
		$status = $nvp['ACK'];
		$shiptocity = $nvp['SHIPTOCITY'];
		$paymentreques_adress_status = $nvp['PAYMENTREQUEST_0_ADDRESSSTATUS'];
		$build = $nvp['CORRELATIONID'];

		$data = array(
			'cd_aluno' => $aluno->id,
			'firstname' => $firstname,
			'email' => $email,
			'token' => $token,
			'payerid' => $payerid,
			'status' => $status,
			'shiptocity' => $shiptocity,
			'paymentreques_adress_status' => $paymentreques_adress_status,
			'build' => $build

		);

		return $this->paypal->add($data); 
	}



	public function createRecurringPay($token, $payerid){
		$datetime = new DateTime('tomorrow');
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POST, true);
		//curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
		curl_setopt($curl, CURLOPT_URL, $this->api_url);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
			'USER' => $this->user,
			'PWD' => $this->pwd,
			'SIGNATURE' => $this->signature,

			'METHOD' => 'CreateRecurringPaymentsProfile',
			'VERSION' => '108',
			'LOCALECODE' => 'pt_BR',

			'TOKEN' => $token,
			'PayerID' => $payerid,

			'PROFILESTARTDATE' => $datetime->format('Y-m-d').'T00:00:00Z',
			'DESC' => 'Marcenaria dos Sonhos',
			'BILLINGPERIOD' => 'Month',
			'BILLINGFREQUENCY' => '1',
			'AMT' => $this->valor,
			'CURRENCYCODE' => 'BRL',
			'COUNTRYCODE' => 'BR',
			'MAXFAILEDPAYMENTS' => 1
		)));

		$response =    curl_exec($curl);
		curl_close($curl);
		$nvp = array();

		if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
			foreach ($matches['name'] as $offset => $name) {
				$nvp[$name] = urldecode($matches['value'][$offset]);
			}
		}

		$id = $this->input->post('id');

		;


		$data = array(
			'nome' => $this->session->userdata('nome'),
			'email' =>$this->session->userdata('email'),
			'cep' => $this->session->userdata('cep'),
			'endereco' => $this->session->userdata('endereco'),
			'bairro' => $this->session->userdata('bairro'),


			'cidade' => $this->session->userdata('cidade'),
			'telefone' => $this->session->userdata('telefone'),
			'complemento' => $this->session->userdata('complemento'),

			'empresa' => $this->session->userdata('empresa'),
			'cnpj' => $this->session->userdata('cnpj')

		);

		$this->form->atualizarProfileID($nvp);

		$this->sendEmail($nvp);

		redirect('http://www.gabster.com.br');
        //$this->load->view('formsuccess');

	}

	private function sendEmail($nvp=null){
        //debug($nvp, 1);
		$profileid = $nvp['PROFILEID'];
        //$profileid = 'I-A3UNU2XBYPFT';

		$paypal_data = $this->db->get_where('paypal', array('profileid' => $profileid))->row();

		$user_data = $this->db->get_where('clientes', array('id' => $paypal_data->idCliente))->row();



		$this->db->select('cliente');

		$this->load->library('Sendgrid');


        # You can add many "to:" using this method.
        #$this->sendgrid->to('carlos.azevedo@gabster.com.br', 'KADU');

		$this->sendgrid->from('no-reply@gabster.com.br', 'No-reply Gabster');
		$this->sendgrid->to('financeiro@gabster.com.br', 'Financeiro Gabster');

		$this->sendgrid->cc('vinicius.unisinos@hotmail.com', 'Vinicius');
		$this->sendgrid->cc('carlos.azevedo@gabster.com.br', 'Kadu');
		$this->sendgrid->reply_to('carlos.azevedo@gabster.com.br', 'Kadu');


        # You can use the "cc" and "bcc" methods too, as above.


        # Use a Sendgrid template (see Sendgrid templates documentation)
		$this->sendgrid->template('d-10681fd31ad5482c967fae650a0400dd');

        # You can pass dynamic data to parse into your template
		$this->sendgrid->template_data('nome'       ,$user_data->nome);        
		$this->sendgrid->template_data('email'      ,$user_data->email);
		$this->sendgrid->template_data('cep'        ,$user_data->cep );
		$this->sendgrid->template_data('endereco'   ,$user_data->endereco  );
		$this->sendgrid->template_data('complemento',$user_data->complemento);
		$this->sendgrid->template_data('bairro'     ,$user_data->bairro );
		$this->sendgrid->template_data('cidade'     ,$user_data->cidade );
		$this->sendgrid->template_data('numero'     ,$user_data->numero );
		$this->sendgrid->template_data('ddd'        ,$user_data->ddd );
		$this->sendgrid->template_data('estado'     ,$user_data->estado );
		$this->sendgrid->template_data('celular'    ,$user_data->celular  );
		$this->sendgrid->template_data('telefone'   ,$user_data->telefone );
		$this->sendgrid->template_data('documento'  ,$user_data->cnpj );

        #$this->sendgrid->template_data('estado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        #$this->sendgrid->template_data('ddd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        #$this->sendgrid->template_data('numero', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        #$this->sendgrid->template_data('celular', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        #$this->sendgrid->template_data('documento', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
		$this->sendgrid->template_data('cod_pagamento', $paypal_data->profileid);


        # The Subject (note that if you are using Templates and defined the subject at
        # template setting, this field will be ignored and the template subject will be 
        # used instead)
		$this->sendgrid->subject('NOVA COMPRA REALIZADA');

        # The message content (note that if you are using Templates this field will
        # be ignored, but is always required)
		$this->sendgrid->content('text/plain', 'jksadjkahdjka');

        # You can attach files by passing the absolute path

        # Lets go!
		$this->sendgrid->send();


	}
}

?>
