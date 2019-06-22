<?php
class Aluno_model extends Super_model {

    public function __construct(){

        parent::__construct();
        $this->table        = 'alunos';
        $this->primary_key  = 'id';

    }  

    public function setAlunoSession($aluno){
		
		$this->session->set_userdata(array('aluno' => $aluno));

    }

    public function isLogged(){

    	$aluno = $this->session->userdata('aluno');

    	//print_r($aluno);die();

    	if ($aluno) {
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }

    public function logout(){
    	
    	$this->session->sess_destroy();

    	header('location:'.BASE.'aluno');

    }

    public function loadCursos(){

        $aluno = $this->session->userdata('aluno');

        $aluno_cursos = $this->aluno_curso->filter(array('cd_aluno' => $aluno->id));

        $data['cursos'] = array();
        
        foreach ($aluno_cursos as $curso) {
            
            $data['cursos'][] = $this->curso->get($curso->cd_curso);
            
        }
        //print_r($data);die();

        return $data;
    }

    
}