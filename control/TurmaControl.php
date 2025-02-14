<?php
include_once(__DIR__."/../dao/TurmaDAO.php");

class TurmaControl {

    private TurmaDAO $turmaDao;

    public function __construct() {
        $this->turmaDao = new TurmaDAO();

    }
    public function listar() {
        $turmas = $this->turmaDao->list();
        return $turmas;
    }
}