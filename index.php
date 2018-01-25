<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';


$app = new \Slim\App;

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    //$response->getBody()->write("Hello, $name");
    $arr = ['dobre ja' => "Hello, $name"];
    for ($i='a'; $i < 'z'; $i++) {
      # code...
      $arr[$i] = "pismeno - $i";

    }
    $response->getBody()->write(json_encode($arr));
    return $response;
});
$app->run();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
