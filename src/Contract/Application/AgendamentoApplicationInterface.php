<?php

namespace Contract\Application;

use Domain\Entity\Agendamento;

interface AgendamentoApplicationInterface
{
    public function agendar(Agendamento $agendamento);
}