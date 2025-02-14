<?php
include_once(__DIR__."/../includes/header.php");

include_once(__DIR__."/../../control/ProfessorControl.php");


$professorControl = new ProfessorControl();
$professores = $professorControl->listar();

//teste array professores
//print_r($professores);

?>

<h2>Lista de professores cadastrados</h2>

<table border="2">
    <tr>
        <th>Nome</th>
        <th>Idade</th>
        <th>Vinculo</th>
        <th>Disciplina</th>
        <th>Turma</th>
        <th></th>

    </tr>

    <?php foreach($professores as $professor): ?>
        <tr>
            <td><?= $professor->getNome() ?></td>
            <td><?= $professor->getIdade() ?></td>
            <td><?= $professor->getVinculo() ?></td>
            <td><?= $professor->getDisciplina() ?></td>
            <td><?= $professor->getTurma() ?></td>
            <td>
                <a href="alterar.php?id=<?= $professor->getId() ?>">
                Alterar</a>
            </td>
            <td>
                <a href="excluir.php?id=<?= $professor->getId() ?>"
            onclick="return confirm('Confirma a exclusão deste professor?');">
            Excluir</a>
        </td>
        </tr>
        <?php endforeach; ?>
</table>

<div>
    <a href="inserir.php">Inserir novo professor</a>
</div>

<?php
require_once(__DIR__."/../includes/footer.php"); 
?>