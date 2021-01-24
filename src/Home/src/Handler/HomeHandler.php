<?php

declare(strict_types=1);

namespace Home\Handler;

use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Http\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomeHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $content = [
            'Say' => [
                'hi' => 'Hello World!'
            ],
        ];

        return new JsonResponse($content, Response::STATUS_CODE_200);
    }
}
