<?php

declare(strict_types=1);

namespace Task\Handler;

use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Http\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Task\QueryHandler\GetTasksQueryHandler;

class GetTasksHandler implements RequestHandlerInterface
{
    private GetTasksQueryHandler $getTasksQueryHandler;

    public function __construct(GetTasksQueryHandler $getTasksQueryHandler)
    {
        $this->getTasksQueryHandler = $getTasksQueryHandler;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $content = $this->getTasksQueryHandler->execute();

        return new JsonResponse($content, Response::STATUS_CODE_200);
    }
}
