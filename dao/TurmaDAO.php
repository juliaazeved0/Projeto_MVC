<?php
#Classe DAO para o model de Curso

include_once(__DIR__ . "/../util/Conexao.php");
include_once(__DIR__ . "/../model/Turma.php");

class TurmaDAO {

    //Método para buscar todos os cursos da base de dados
    public function list() {
        $con = Conexao::getConexao();

        $sql = "SELECT * FROM turma ORDER BY nome";
        $stm = $con->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        $turmas = $this->mapTurmas($result);
        return $turmas;
    }

    //Método que mapeia os registros do banco em objetos Curso
    private function mapTurmas($registros) {
        $turmas = array();

        foreach($registros as $reg) {
            //Para cada registro, criar um objeto Curso
            $turma = new Turma();
            $turma->setId($reg["id"]);
            $turma->setNome($reg["nome"]);

            array_push($turmas, $turma);
        }
        return $turmas;
    }

}