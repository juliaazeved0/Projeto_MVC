CREATE DATABASE projeto_mvc;

USE projeto_mvc;

CREATE TABLE disciplina ( /*campo select*/
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(50) NOT NULL, 
    CONSTRAINT pk_disciplina PRIMARY KEY (id)
);

INSERT INTO disciplina (nome) VALUES ('Matemática'); 
INSERT INTO disciplina (nome) VALUES ('Física');
INSERT INTO disciplina (nome) VALUES ('Química');
INSERT INTO disciplina (nome) VALUES ('Português');
INSERT INTO disciplina (nome) VALUES ('História');
INSERT INTO disciplina (nome) VALUES ('Filosofia');
INSERT INTO disciplina (nome) VALUES ('Educação Física');
INSERT INTO disciplina (nome) VALUES ('Sociologia');
INSERT INTO disciplina (nome) VALUES ('Artes');
INSERT INTO disciplina (nome) VALUES ('Biologia');

CREATE TABLE turma ( /*campo select*/
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(50) NOT NULL,  
    CONSTRAINT pk_turma PRIMARY KEY (id)
);

INSERT INTO turma (nome) VALUES ('1º ano');
INSERT INTO turma (nome) VALUES ('2º ano');
INSERT INTO turma (nome) VALUES ('3º ano');
INSERT INTO turma (nome) VALUES ('4º ano');

CREATE TABLE vinculo ( /*campo select*/
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(20) NOT NULL,
    CONSTRAINT pk_vinculo PRIMARY KEY (id)
);

INSERT INTO vinculo (nome) VALUES ('PSS');
INSERT INTO vinculo (nome) VALUES ('Celetista');
INSERT INTO vinculo (nome) VALUES ('Estatutário');

CREATE TABLE professor (
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(50) NOT NULL,
    idade int NOT NULL,
    id_disciplina int NOT NULL,
    id_turma int NOT NULL,
    id_vinculo int NOT NULL,
    CONSTRAINT id_professor PRIMARY KEY (id),
    CONSTRAINT pk_disciplina FOREIGN KEY (id_disciplina) REFERENCES disciplina (id),
    CONSTRAINT pk_turma FOREIGN KEY (id_turma) REFERENCES turma (id),
    CONSTRAINT pk_vinculo FOREIGN KEY (id_vinculo) REFERENCES vinculo (id)
);




