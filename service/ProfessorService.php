<?php

include_once(__DIR__ . "/../model/Professor.php");

class ProfessorService {

    public function validar(Professor $professor) {
        $erros = array();

        if(! $professor->getNome())
            array_push($erros, "Informe o nome do professor!");

        if(! $professor->getIdade())
            array_push($erros, "Informe a idade do professor!");
        
        if($professor->getIdade() < 18)
            array_push($erros, "Idade mínima: 18 anos!"); 

        if(! $professor->getDisciplina())
            array_push($erros, "Selecione uma disciplina!");

        if(! $professor->getVinculo())
            array_push($erros, "Selecione o tipo de vinculo!");
        
        if(! $professor->getTurma())
            array_push($erros, "Selecione uma turma!");
        
        
        return $erros;
    }

}