<?php 
//EXCLUIR
require_once(__DIR__ . "/../../control/ProfessorControl.php");

//Captura o parâmetro GET com o ID do professor
$id = 0;
if(isset($_GET['id']) && is_numeric($_GET['id']))
    $id = $_GET['id'];

//Verifica se prof existe chamando método buscaId com parametro id
$professorControl = new ProfessorControl();
$professor = $professorControl->buscaId($id);

if($professor) {
    //chama o método excluir q recebe como parametro o id
    $erros = $professorControl->excluir($id);

    header("location: listar.php");
    exit;

} else {
    echo "Professor não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
}


