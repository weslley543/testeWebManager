<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aluno_model extends CI_Model{
    private $table = 'Alunos';
    public function __construct(){
        parent:: __construct();
        
    }
    /**cadastra um aluno no banco de dados */
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

    /** pega um aluno pelo id do curso e pelo nome*/
    public function getAluno($id_curso, $nome_aluno){
       return $this->db->select('alunos.*')
       ->from($this->table)
       ->where('alunos.id_curso',$id_curso)
       ->where('alunos.nome_aluno',$nome_aluno)->get()->row();
        
    }
    /** Recebe um aluno pelo ID */
    public function getAlunoById($id_aluno){
        return $this->db->where('id_aluno', $id_aluno)->get($this->table)->row();
    }
    /**Função que grava as alterações no banco de dados */
    public function update($id_aluno,$dados){
        return $this->db->where('id_aluno', $id_aluno)->update($this->table,$dados);
    }

}