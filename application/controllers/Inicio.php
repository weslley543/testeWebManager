<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Curso_model', 'model_curso');
		$dados['cursos'] = $this->model_curso->getAll();
		
		$this->load->view('html_header');
		$this->load->view('pagina_1',$dados);
		$this->load->view('html_footer');
	}
	public function cadastar_curso(){
		$this->load->view('html_header');
		$this->load->view('cadastrar_curso');
		$this->load->view('html_footer');
	}
	public function listar_alunos(){
		
		$this->load->model('Curso_model', 'model_curso');
		$dados['cursos']=$this->model_curso->getAll();
		
		
		$this->load->view('html_header');
		$this->load->view('listar_aluno',$dados);
		$this->load->view('html_footer');
	}
}
