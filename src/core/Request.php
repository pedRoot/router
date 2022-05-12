<?php

namespace Ptorres\Router\core;

class Request
{
    private const PATH_RESOURCE = 1;
    private const PARAMETER = 2;

    public function getMethod(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function parseUrlToString(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getUrl(): array
    {
        $url = explode('/', parse_url($_SERVER['REQUEST_URI'])['path']);
        unset($url[0]);

        return $url;
    }

    public function getPath(): string
    {
        $url = $this->getUrl();
        return count($url) > 1 ? $this->clean($url[self::PATH_RESOURCE]) : '';
    }

    public function is(string $method): bool
    {
        return $this->getMethod() === strtolower($method);
    }

    public function getParam(string $key): array
    {
        $param[$key] = count($url = $this->getUrl()) > 1 ? $this->clean($url[self::PARAMETER]) : '';

        return $param;
    }

    public function getBody(): array
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    private function clean(string $item)
    {
        $item = stripslashes(htmlspecialchars($item));
        return trim($item);
    }
}
