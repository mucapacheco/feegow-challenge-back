<?php

namespace Domain\Service;

use Contract\Domain\AgendamentoDomainInterface;
use Contract\Infrastructure\AgendamentoInfrastructureInterface;
use Domain\Entity\Agendamento;

class AgendamentoDomain implements AgendamentoDomainInterface
{

    private $infra;

    public function __construct(AgendamentoInfrastructureInterface $infra)
    {
        $this->infra = $infra;
    }

    public function agendar(Agendamento $agendamento)
    {
        return $this->infra->agendar($agendamento);
    }

    public function findAll()
    {
        return $this->infra->findAll();
    }


}