<?php

use Ptorres\Router\core\Request;
use Ptorres\Router\core\Response;

require __DIR__ . '/vendor/autoload.php';

$request = new Request();
$response = new Response();

$data  = [];

$data['resource'] = $request->getPath();
$data['method'] = $request->getMethod();
$data['url'] = $request->parseUrlToString();

if ($request->is('GET')) {
    $data['params'] = $request->getParam('id');
}

if ($request->is('POST')) {
    $data['body'] = $request->getBody();
}

$response->setStatusCode(200);
$response->responseInFormatJson($data);
