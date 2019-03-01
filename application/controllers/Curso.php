<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller{
     public function __construct(){
          parent:: __construct();
          $this->load->library('form_validation');
          $this->load->model('Curso_model', 'model_curso');
         
      }
      public function cadastrar(){
          $this->form_validation->set_rules('nomecurso', 'NOMECURSO', array('required', 'min_length[4]', 'max_length[50]'));
          if($this->form_validation->run()){
               $dados['nome_do_curso'] = $this->input->post('nomecurso');
               if($this->model_curso->cadastra($dados)){
                    redirect('Inicio/cadastar_curso');
               }else{
                    echo "Erro";
               }
               
          }else{
               echo validation_errors();
          }
      }
      public function todosOsCursos(){
           $dados = $this->model_curso->getAll();
           header('Content-Type: application/json; charset=utf-8');
		 echo json_encode($dados,JSON_UNESCAPED_UNICODE);
      }
}