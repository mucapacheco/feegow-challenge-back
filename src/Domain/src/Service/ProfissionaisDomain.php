<?php

namespace Domain\Service;

use Contract\Domain\ProfissionaisDomainInterface;
use Contract\Infrastructure\ProfissionaisInfrastructureInterface;

class ProfissionaisDomain implements ProfissionaisDomainInterface
{
    private $infra;

    public function __construct(ProfissionaisInfrastructureInterface $infra)
    {
        $this->infra = $infra;
    }

    public function getProfissionais($especialidade = null)
    {
        return $this->infra->getProfissionais($especialidade);
    }
}