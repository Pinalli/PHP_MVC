<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControladorRequisicao
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager =  (new EntityManagerCreator())
            -> getEntityManager();
    }

    public function processaRequisicao()
    {
        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );

        $curso = new Curso();
        $curso->setDescricao($descricao);
        $this->entityManager->persist($curso);
        $this->entityManager->flush();

        //https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Redirecionamento
        header('Location: /listar-cursos', true, 302);
    }
}