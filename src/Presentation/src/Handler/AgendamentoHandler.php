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
        $agendamento = Hydrator::hydrator([
            "specialty_id" => 123,
            "professional_id" => 1234,
            "name" => 12345,
            "cpf" => 123456,
            "source_id" => 123,
        ],new Agendamento());

        $agendamento = $this->app->agendar($agendamento);

        return new JsonResponse(Hydrator::extract($agendamento));
    }
}
