<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->model('Aluno_model', 'model_aluno');
    }
    /*Cadastra um aluno */
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
            //echo "<script>alert('Cadastrado com sucesso')</script>";
            redirect("Inicio/index");
        }else{
            echo "problema ao cadastrar";
        }
       }else{
            echo validation_errors();
       }
    }
    /*Seleciona um aluno por curso e id */
    public function get(){
        $id_curso= $this->input->post("id_curso");
        $nome_aluno= $this->input->post("nome_aluno");
        
        $dado = $this->model_aluno->getAluno($id_curso, $nome_aluno);
        
        
        header('Content-Type: application/json; charset=utf-8');
		echo json_encode($dado,JSON_UNESCAPED_UNICODE);
    }
    /*essa função é apenas para pegar os dados do aluno para abrir o edit */
    public function edit(){
        $id_aluno = $this->input->post("id");
        
        $dado= $this->model_aluno->getAlunoById($id_aluno);

        header('Content-Type: application/json; charset=utf-8');
		echo json_encode($dado,JSON_UNESCAPED_UNICODE);
        

    }
    /*função para escrever as alterações no banco */

    public function editar(){
        $id_aluno = $this->input->post('id');
        $dados['data_nascimento']= $this->input->post('date');
        $dados['nome_aluno'] = $this->input->post('nome');
        $dados['id_curso'] = $this->input->post('curso_id');
        $dados['telefone_aluno'] = $this->input->post('telefone');

        $this->model_aluno->update($id_aluno,$dados);
        
        $dado_atualizado = $this->model_aluno->getAlunoById($id_aluno);

        header('Content-Type: application/json; charset=utf-8');
		echo json_encode($dado_atualizado,JSON_UNESCAPED_UNICODE);
    }
}