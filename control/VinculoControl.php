<?php
include_once(__DIR__."/../dao/VinculoDAO.php");

class VinculoControl {

    private VinculoDAO $vinculoDao;

    public function __construct() {
        $this->vinculoDao = new VinculoDAO();

    }
    public function listar() {
        $vinculos = $this->vinculoDao->list();
        return $vinculos;
    }
}