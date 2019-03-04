<?php

declare(strict_types=1);

namespace Presentation\Handler;

use Contract\Application\FeegowApplicationInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class FeegowGenericHandler implements RequestHandlerInterface
{
    private $app;

    public function __construct(FeegowApplicationInterface $app)
    {
        $this->app = $app;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $path = str_replace('/api/feegowgeneric','',$request->getUri()->getPath());

            $data = $this->app->get($path, $request->getQueryParams());

            return new JsonResponse($data, 200, ['Access-Control-Allow-Origin' => '*']);
        } catch (\Throwable $e) {
            return new JsonResponse(["success" => false, "content" => [], "msg" => $e->getMessage()], 500);
        }

    }
}
