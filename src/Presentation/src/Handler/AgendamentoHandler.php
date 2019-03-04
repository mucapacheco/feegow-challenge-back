<?php

declare(strict_types=1);

namespace Presentation\Handler;

use Contract\Application\AgendamentoApplicationInterface;
use Domain\Entity\Agendamento;
use Presentation\Util\Hydrator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class AgendamentoHandler implements RequestHandlerInterface
{
    private $app;

    public function __construct(AgendamentoApplicationInterface $app)
    {
        $this->app = $app;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $json = $request->getBody()->getContents();
            $json = json_decode($json, true);

            if ($json === false) {
                throw new \Exception("Não foi possível realizar o agendamento.");
            }

            $agendamento = Hydrator::hydrator($json, new Agendamento());

            $agendamento = $this->app->agendar($agendamento);

            return new JsonResponse(["success" => true, "content" => Hydrator::extract($agendamento)], 200, ['Access-Control-Allow-Origin' => '*']);
        } catch (\Throwable $e) {
            return new JsonResponse(
                ["success" => false, "content" => [], "msg" => $e->getMessage()],
                200,
                ['Access-Control-Allow-Origin' => '*']
            );
        }

    }
}
