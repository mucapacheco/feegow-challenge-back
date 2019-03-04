<?php

namespace Contract\Infrastructure;

interface ProfissionaisInfrastructureInterface
{
    public function getProfissionais($especialidade = null);
}