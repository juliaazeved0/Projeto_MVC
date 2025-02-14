<?php
include_once(__DIR__."/../dao/DisciplinaDAO.php");

class DisciplinaControl {

    private DisciplinaDAO $disciplinaDao;

    public function __construct() {
        $this->disciplinaDao = new DisciplinaDAO();

    }
    public function listar() {
        $disciplinas = $this->disciplinaDao->list();
        return $disciplinas;
    }
}