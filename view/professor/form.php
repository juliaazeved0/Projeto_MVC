<?php

include_once(__DIR__ . "/../../control/DisciplinaControl.php");
include_once(__DIR__."/../../control/TurmaControl.php");
include_once(__DIR__."/../../control/VinculoControl.php");

include_once(__DIR__."/../../service/ProfessorService.php");

//instanciando a classe DisciplinaControl para inicializar $discipilnas
$disciplinaControl = new DisciplinaControl();
$disciplinas = $disciplinaControl->listar();

//para turmas
$turmaControl = new TurmaControl();
$turmas = $turmaControl->listar(); 

//para vinculos
$vinculoControl = new VinculoControl();
$vinculos = $vinculoControl->listar();


require_once(__DIR__."/../includes/header.php");
?>


<h2>Formulário - professor</h2>

<form name="formprofessor" method="POST">

    <div>
        <label for="textNome"> Nome: </label>
        <input type="text" id="textNome" name="nome"
            value="<?= ($professor ? $professor->getNome() : '') ?>" />
    </div>
        
        <label for="textIdade"> Idade: </label>
        <input type="number" id="textIdade" name="idade"
            value="<?= ($professor ? $professor->getIdade() : '') ?>" />
    
    <div>
        <label for="selVinculo"> Vinculo com a instituição: </label>
        <select id="selVinculo" name="vinculo">
        <option value="">---Selecione o tipo de vinculo---
            <?php foreach($vinculos as $v) : ?>
                <option value="<?= $v->getId() ?>"
                <?= (isset($professor) && $professor->getVinculo() &&
                $professor->getVinculo()->getId() == $v->getId() ? "selected" : "") ?> >
            <?= $v->getNome() ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div>
        <label for= "selDisciplina"> Disciplina: </label>
        <select id="selDisciplina" name="disciplina">
            <option value="">---Selecione uma disciplina---
            <?php foreach($disciplinas as $d): ?>
                <option value="<?= $d->getId() ?>" 
                    <?= (isset($professor) && $professor->getDisciplina() && 
                        $professor->getDisciplina()->getId() == $d->getId() ? "selected" : "" ) ?> >
            <?= $d->getNome() ?></option>        
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="selTurma"> Turma: </label>
        <select id="selTurma" name="turma">
            <option value="">---Selecione uma turma---
                <?php foreach($turmas as $t): ?>
                    <option value="<?= $t->getId() ?>"
                    <?= (isset($professor) && $professor->getTurma() &&
                    $professor->getTurma()->getId() == $t->getId() ? "selected" : "" ) ?> >
            <?= $t->getNome() ?></option>
            <?php endforeach; ?>
        </select>

    </div>

    <input type="hidden" name="id"
    value="<?=($professor ? $professor->getId() : '') ?>">
    <button type="submit">Cadastrar</button>

</form>

    <?php if ($msgErro): ?>
        <div id="msgErro" style="color:red;">
            <?= $msgErro ?>
        </div>
        <?php endif; ?>
<div>
    <a href="listar.php">Voltar</a>
</div>



<?php
require_once(__DIR__."/../includes/footer.php");
?>