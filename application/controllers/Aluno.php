<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->model('Aluno_model', 'model_aluno');
    }
    
    public function cadastrar(){
       $this->form_validation->set_rules('nome', 'NOME', array('required', 'min_length[4]','max_length[50]'));
       $this->form_validation->set_rules('data_nascimento', 'DATA', 'required');
       $this->form_validation->set_rules('telefone', 'TELEFONE', array('required', 'max_length[15]'));

       if($this->form_validation->run()){
        $dados['nome_aluno'] = $this->input->post('nome');
        $dados['data_nascimento'] = $this->input->post('data_nascimento');
        $dados['telefone_aluno'] = $this->input->post('telefone');
        $dados['data_cadastro'] = date('d/m/y');
        $dados['id_curso'] = $this->input->post('curso');
        
        
        if($this->model_aluno->cadastra($dados)){
            echo "E-mail enviado com sucesso!";
        }else{
            echo "problema ao cadastrar";
        }
       }else{
            echo validation_errors();
       }
    }
    
    public function get(){
        $id_curso= $this->input->post("id_curso");
        $nome_aluno= $this->input->post("nome_aluno");
        
        $dado = $this->model_aluno->getAluno($id_curso, $nome_aluno);
        
        
        header('Content-Type: application/json; charset=utf-8');
		echo json_encode($dado,JSON_UNESCAPED_UNICODE);
    }
    
    public function edit(){
        $id_aluno = $this->input->post("id");
        
        $dado= $this->model_aluno->getAlunoById($id_aluno);

        header('Content-Type: application/json; charset=utf-8');
		echo json_encode($dado,JSON_UNESCAPED_UNICODE);
        

    }
}