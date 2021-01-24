<?php

declare(strict_types=1);

namespace Task\Handler;

use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Http\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SaveTaskHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
            return new JsonResponse(
                ['error message'],
                Response::STATUS_CODE_400
            );
    }
}
