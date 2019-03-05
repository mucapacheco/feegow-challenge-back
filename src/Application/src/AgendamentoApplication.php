<?php

namespace Application;

use Contract\Application\AgendamentoApplicationInterface;
use Contract\Domain\AgendamentoDomainInterface;
use Domain\Entity\Agendamento;

class AgendamentoApplication implements AgendamentoApplicationInterface
{
    private $domain;

    public function __construct(AgendamentoDomainInterface $domain)
    {
        $this->domain = $domain;
    }

    public function agendar(Agendamento $agendamento)
    {
        return $this->domain->agendar($agendamento);
    }

    public function findAll()
    {
        return $this->domain->findAll();
    }

}