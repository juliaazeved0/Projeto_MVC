<?php
include_once(__DIR__."/../model/Disciplina.php");
include_once(__DIR__."/../util/Conexao.php");


class DisciplinaDAO {

    public function list() {
        $con = Conexao::getConexao();

        $sql = "SELECT * FROM disciplina ORDER BY nome";
        //preparar sempre igual
        $stm = $con->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $disciplinas = $this->mapDisciplinas($result);
        return $disciplinas;
    }

    private function mapDisciplinas($registros){
        $disciplinas = array();

        foreach ($registros as $reg) {

            $disciplina = new Disciplina();
            $disciplina->setId($reg["id"]);
            $disciplina->setNome($reg["nome"]);
    
            array_push($disciplinas, $disciplina);
        }
        return $disciplinas;
    }

}