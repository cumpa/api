<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'config.php';


$app = new \Slim\App($config);

var_dump($app->getContainer('config')->get('db'));
//die();

$db = new DB($app->getContainer('config')->get('db'));

$app->get('/', function (Request $request, Response $response, array $args){
    $message = 'Welcome';
    return $response->getBody()->write($message);
});

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $matches = [];
    preg_match('/:[a-zA-Z]*/',$name,$matches);
    //$response->getBody()->write("Hello, $name");
    $arr = ['dobre ja' => "Hello, $name"];
    $arr = $matches;
    //for ($i='a'; $i < 'z'; $i++) {
    //  # code...
    //  $arr[$i] = "pismeno - $i";
//
    //}
    $response->getBody()->write(json_encode($arr));
    return $response;
});
$app->run();
 ?>
