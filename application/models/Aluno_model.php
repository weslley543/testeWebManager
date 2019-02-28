<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aluno_model extends CI_Model{
    private $table = 'Alunos';
    public function __construct(){
        parent:: __construct();
        
    }
    
    public function cadastra($dados){
        return $this->db->insert($this->table, $dados);
    }
    public function getAll(){
        $this->db->select('alunos.id_aluno, alunos.nome_aluno, alunos.data_nascimento, alunos.data_cadastro
        , alunos.telefone_aluno, cursos.id_curso as cursos');

        $this->db->from($this->table);
        $this->db->join('cursos', 'alunos.id_curso = cursos.id_curso');
        return $this->db->get()->result();
    }

    
    public function getAluno($id_curso, $nome_aluno){
       return $this->db->select('alunos.*')
       ->from($this->table)
       ->where('alunos.id_curso',$id_curso)
       ->where('alunos.nome_aluno',$nome_aluno)->get()->row();
        
    }
    public function getAlunoById($id_aluno){
        return $this->db->where('id_aluno', $id_aluno)->get($this->table)->row();
    }


}