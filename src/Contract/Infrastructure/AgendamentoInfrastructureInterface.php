<?php

namespace Contract\Infrastructure;

use Domain\Entity\Agendamento;

interface AgendamentoInfrastructureInterface
{
    public function agendar(Agendamento $agendamento);
}