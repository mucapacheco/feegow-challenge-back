<?php

declare(strict_types=1);

namespace Presentation\Handler;

use Contract\Application\EspecialidadesApplicationInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class EspecialidadesHandler implements RequestHandlerInterface
{
    private $app;

    public function __construct(EspecialidadesApplicationInterface $app)
    {
        $this->app = $app;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $especialidades = $this->app->getEspecialidades();

            return new JsonResponse($especialidades, 200, ['Access-Control-Allow-Origin' => '*']);
        } catch (\Throwable $e) {
            return new JsonResponse(
                ["success" => false, "content" => [], "msg" => $e->getMessage()],
                500,
                ['Access-Control-Allow-Origin' => '*']
            );
        }
    }
}
