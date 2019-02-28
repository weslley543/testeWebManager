<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model{
    private $table = 'Cursos';
    public function __construct(){
        parent:: __construct();
        
    }
    public function cadastra($dados){
        return $this->db->insert($this->table, $dados);
    }
    public function getAll(){
        return $this->db->get($this->table)->result();
    }
    
}