<?php

namespace Contract\Domain;

use Domain\Entity\Agendamento;

interface AgendamentoDomainInterface
{
    public function agendar(Agendamento $agendamento);
}