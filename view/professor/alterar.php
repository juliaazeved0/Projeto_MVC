<?php

include_once(__DIR__ . "/../../model/Professor.php");
include_once(__DIR__ . "/../../control/ProfessorControl.php");

$msgErro = "";
$aluno = null;

$professorControl = new ProfessorControl();

if(isset($_POST['nome'])) {
    $id= $_POST['id'];
    $nome=trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $idade=is_numeric($_POST['idade']) ? $_POST['idade'] : null;
    $vinculo=is_numeric($_POST['vinculo']) ? $_POST['vinculo'] : null;
    $disciplina=is_numeric($_POST['disciplina']) ? $_POST['disciplina'] : null;
    $turma=is_numeric($_POST['turma']) ? $_POST['turma'] : null;
  
    $professor = new Professor();
    $professor->setId($id);
    $professor->setNome($nome);
    $professor->setIdade($idade);
    
    if($vinculo) {
        $vinculoObj = new Vinculo();
        $vinculoObj->setId($vinculo);
        $professor->setVinculo($vinculoObj);
    } else 
        $professor->setVinculo(null);
        
    if($disciplina) {
        $disciplinaObj = new Disciplina();
        $disciplinaObj->setId($disciplina);
        $professor->setDisciplina($disciplinaObj);
    } else 
        $professor->setDisciplina(null);
    
    if($turma) {
        $turmaObj = new Turma();
        $turmaObj->setId($turma);
        $professor->setTurma($turmaObj);
    } else 
        $professor->setTurma(null);


    //Chama o controller para alterar o aluno
    $erros = $professorControl->alterar($professor);

    if(empty($erros)) {
        //Redireciona para a listagem
        header("location: listar.php");
        exit;
    } else
        $msgErro = implode("<br>", $erros);
} else {
    //antes de gravar os dados
    $id = 0;
    if(isset($_GET['id']))
        $id = $_GET['id'];

    //gravando os dados 
    $professor = $professorControl->buscaId($id);

    //Validar se o professor existe 
    if(! $professor) {
        echo "Professor não encontrado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

//Incluir o formulário
include_once(__DIR__ . "/form.php");
