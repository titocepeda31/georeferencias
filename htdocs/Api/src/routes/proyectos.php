<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// Definir la ruta para obtener todos los proyectos
$app->get('/proyectos', function (Request $request, Response $response, array $args) {
    // Obtener la instancia de la conexión PDO desde el contenedor de Slim
    $db = $this->get('db');
    // Preparar la consulta SQL
    $sql = 'SELECT * FROM proyectos WHERE estado = 1';
    // Ejecutar la consulta
    $stmt = $db->query($sql);
    // Obtener los resultados
    $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Devolver los resultados como JSON
    /** @var ResponseInterface $response */
    return $response->withJson($proyectos);
});
