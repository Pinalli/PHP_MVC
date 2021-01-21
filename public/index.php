<?php
/**
 * MVC define 3 camadas:

Modelo: Classes com a lógica de negócio e persistência
View: Arquivos com o código HTML
Controller: Classes que ligam o Model e View
 */
require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\InterfaceControladorRequisicao;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persistencia;

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';

    if (!array_key_exists($caminho, $rotas)) {
       http_response_code(404);
        exit();
}

$classeContoladora = $rotas[$caminho];
/** @var InterfaceControladorRequisicao $controlador */
$controlador = new $classeContoladora();
$controlador->processaRequisicao();


