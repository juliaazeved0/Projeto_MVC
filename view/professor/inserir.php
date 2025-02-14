<?php
include_once(__DIR__."/../../model/Professor.php");
include_once(__DIR__."/../../control/ProfessorControl.php");
//include_once(__DIR__."/../../service/ProfessorService.php");

$msgErro = null;
$professor = null;


if(isset($_POST['nome'])){

    $nome=trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $idade=is_numeric($_POST['idade']) ? $_POST['idade'] : null;
    $vinculo=is_numeric($_POST['vinculo']) ? $_POST['vinculo'] : null;
    $disciplina=is_numeric($_POST['disciplina']) ? $_POST['disciplina'] : null;
    $turma=is_numeric($_POST['turma']) ? $_POST['turma'] : null;


    $professor = new Professor();
    $professor->setId(0);
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


    //acionando controller    
    $professorControl = new ProfessorControl();
    $erros = $professorControl->inserir($professor);

    if(empty($erros)) {
        header("location:listar.php");
        exit;
    } else 
        $msgErro =implode("<br>", $erros);
}
include_once(__DIR__."/form.php");