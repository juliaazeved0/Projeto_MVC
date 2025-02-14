<?php
include_once(__DIR__ . "/../util/Conexao.php");
include_once(__DIR__ . "/../model/Disciplina.php");
include_once(__DIR__ . "/../model/Professor.php");
include_once(__DIR__ . "/../model/Turma.php");
include_once(__DIR__ . "/../model/Vinculo.php");

class ProfessorDAO
{

    public function list()
    {
        $con = Conexao::getConexao();

        $sql = "SELECT p.*, d.nome nome_disciplina,
        v.nome nome_vinculo, t.nome nome_turma
        FROM professor p
        JOIN disciplina d ON (d.id = p.id_disciplina)
        JOIN vinculo v ON (v.id = p.id_vinculo)
        JOIN turma t ON (t.id = p.id_turma)";


        $stm = $con->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $professores = $this->mapProfessores($result);
        return $professores;
    }

    public function findById(int $id)
    {
        $con = Conexao::getConexao();

        $sql = "SELECT p.*, d.nome nome_disciplina, 
        v.nome nome_vinculo, t.nome nome_turma
        FROM professor p
        JOIN disciplina d ON (d.id = p.id_disciplina)
        JOIN vinculo v ON (v.id = p.id_vinculo)
        JOIN turma t ON (t.id = p.id_turma)
        WHERE p.id = ?";

        $stm = $con->prepare($sql);
        $stm->execute(array($id));
        $result = $stm->fetchAll();

        $professores = $this->mapProfessores($result);

        if (count($professores) > 0)
            return $professores[0];

        return null;
    }

    public function insert(Professor $professor)
    {
        $con = Conexao::getConexao();

        $sql = "INSERT INTO professor (
        nome, idade, id_vinculo, id_disciplina, id_turma) VALUES (?, ?, ?, ?, ?)";

        //PREPARA
        $stm = $con->prepare($sql);
        $stm->execute(array(
            $professor->getNome(),
            $professor->getIdade(),
            $professor->getVinculo()->getId(),
            $professor->getDisciplina()->getId(),
            $professor->getTurma()->getId()
        ));
    }

    public function update(Professor $professor)
    {
        $con = Conexao::getConexao();

        $sql = "UPDATE professor
                SET nome=?, 
                idade=?, 
                id_vinculo=?, 
                id_disciplina=?, 
                id_turma=?
                WHERE id =?";
        
        //PREPARAA
        $stm = $con->prepare($sql);
        $stm->execute(array(
            $professor->getNome(),
            $professor->getIdade(),
            $professor->getVinculo()->getId(),
            $professor->getDisciplina()->getId(),
            $professor->getTurma()->getId(),
            $professor->getId()
        ));
    }
    

    public function delete(int $id)
    {
        $con = Conexao::getConexao();

        $sql = "DELETE FROM professor WHERE id = ?";
        $stm = $con->prepare($sql);
        $stm->execute(array($id));
    }

    private function mapProfessores($registros)
    {
        $professores = array();

        foreach ($registros as $reg) {

            $professor = new Professor();
            $professor->setId($reg["id"]);
            $professor->setNome($reg["nome"]);
            $professor->setIdade($reg["idade"]);
        
            // Disciplina
            $disciplina = new Disciplina();
            $disciplina->setId($reg["id_disciplina"]);
            $disciplina->setNome($reg["nome_disciplina"]);
            $professor->setDisciplina($disciplina);

            // Turma
            $turma = new Turma();
            $turma->setId($reg["id_turma"]);
            $turma->setNome($reg["nome_turma"]);
            $professor->setTurma($turma);

            //vinculooooo
            $vinculo = new Vinculo();
            $vinculo->setId($reg["id_vinculo"]);
            $vinculo->setNome($reg["nome_vinculo"]);
            $professor->setVinculo($vinculo);


            array_push($professores, $professor);
        }
        return $professores;
    }
}
