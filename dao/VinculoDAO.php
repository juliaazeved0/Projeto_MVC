<?php

include_once(__DIR__ . "/../util/Conexao.php");
include_once(__DIR__ . "/../model/Vinculo.php");

class VinculoDAO {

    //Método para buscar todos os cursos da base de dados
    public function list() {
        $con = Conexao::getConexao();

        $sql = "SELECT * FROM vinculo ORDER BY nome";
        $stm = $con->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        $vinculos = $this->mapVinculo($result);
        return $vinculos;
    }

    //Método que mapeia os registros do banco em objetos Curso
    private function mapVinculo($registros) {
        $vinculos = array();

        foreach($registros as $reg) {
            //Para cada registro, criar um objeto Curso
            $vinculo = new Vinculo();
            $vinculo->setId($reg["id"]);
            $vinculo->setNome($reg["nome"]);

            array_push ($vinculos, $vinculo);
        }
        return $vinculos;
    }

}