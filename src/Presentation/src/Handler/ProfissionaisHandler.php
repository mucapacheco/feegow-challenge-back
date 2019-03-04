<?php

declare(strict_types=1);

namespace Presentation\Handler;

use Contract\Application\ProfissionaisApplicationInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class ProfissionaisHandler implements RequestHandlerInterface
{
    private $app;

    public function __construct(ProfissionaisApplicationInterface $app)
    {
        $this->app = $app;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $especialidade = $request->getQueryParams()['especialidade_id'] ?? null;

            if (!is_numeric($especialidade)) {
                throw new \Exception("Parâmetro [especialidade_id] não informado.");
            }

            $profissionais = $this->app->getProfissionais($especialidade);

            return new JsonResponse($profissionais, 200, ['Access-Control-Allow-Origin' => '*']);
        } catch (\Throwable $e) {
            return new JsonResponse(["success" => false, "content" => [],"msg"=>$e->getMessage()], 500);
        }

    }
}
