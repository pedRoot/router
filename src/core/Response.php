<?php

namespace Ptorres\Router\core;

class Response
{
    public function setStatusCode(int $codeResponse)
    {
        http_response_code($codeResponse);
    }

    public function redirect(string $newUrl = '/')
    {
        header('Location: ' . $newUrl);
    }

    public function responseInFormatJson(array $data)
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
    }
}
