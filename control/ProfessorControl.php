<?php

include_once(__DIR__. "/../dao/ProfessorDAO.php");
include_once(__DIR__."/../service/ProfessorService.php");
class ProfessorControl {

    private ProfessorDAO $professorDao;
    private ProfessorService $professorService;


    public function __construct() {
        $this->professorDao = new ProfessorDAO();
        $this->professorService = new ProfessorService();
    }

    public function listar() {
        $professores = $this->professorDao->list();
        return $professores;
    }

    public function buscaId(int $id) {
        $professor = $this->professorDao->findById($id);
        return $professor;
    }

    public function inserir(Professor $professor) {
        $erros = $this->professorService->validar($professor);
        if($erros){
            return $erros;

        }
        else{
        $this->professorDao->insert($professor);
        return array();}
    }

    public function alterar(Professor $professor) {
        $erros = $this->professorService->validar($professor);
       if($erros)
       return $erros;
        
       $this->professorDao->update($professor);
       return array();

    }
    public function excluir(int $id) { 
        $this->professorDao->delete($id);
    }

}