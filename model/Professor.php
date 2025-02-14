<?php

include_once(__DIR__."/Disciplina.php");
include_once(__DIR__."/Turma.php");
include_once(__DIR__."/Vinculo.php");

class Professor {
    private ?int $id;
    private ?string $nome;
    private ?int $idade;
    private ?Vinculo $vinculo;
    private ?Disciplina $disciplina;
    private ?Turma $turma;

    
    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of idade
     */
    public function getIdade(): ?int
    {
        return $this->idade;
    }

    /**
     * Set the value of idade
     */
    public function setIdade(?int $idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    /**
     * Get the value of vinculo
     */
    public function getVinculo(): ?Vinculo
    {
        return $this->vinculo;
    }

    /**
     * Set the value of vinculo
     */
    public function setVinculo(?Vinculo $vinculo): self
    {
        $this->vinculo = $vinculo;

        return $this;
    }

    /**
     * Get the value of disciplina
     */
    public function getDisciplina(): ?Disciplina
    {
        return $this->disciplina;
    }

    /**
     * Set the value of disciplina
     */
    public function setDisciplina(?Disciplina $disciplina): self
    {
        $this->disciplina = $disciplina;

        return $this;
    }

    /**
     * Get the value of turma
     */
    public function getTurma(): ?Turma
    {
        return $this->turma;
    }

    /**
     * Set the value of turma
     */
    public function setTurma(?Turma $turma): self
    {
        $this->turma = $turma;

        return $this;
    }
}