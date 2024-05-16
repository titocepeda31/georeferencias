<?php

// api slim
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require '../../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = '172.16.238.10';
$config['db']['user']   = 'root';
$config['db']['pass']   = 'nokia,.1979';
$config['db']['dbname'] = 'georeferencias';

$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer(); // Obtenemos el contenedor de dependencias

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO(
        'mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
        $db['user'],
        $db['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

require_once '../routes/proyectos.php';

$app->run();
