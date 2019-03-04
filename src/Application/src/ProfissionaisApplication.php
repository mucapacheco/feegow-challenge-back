<?php

namespace Application;

use Contract\Application\ProfissionaisApplicationInterface;
use Contract\Domain\ProfissionaisDomainInterface;

class ProfissionaisApplication implements ProfissionaisApplicationInterface
{
    private $domain;

    public function __construct(ProfissionaisDomainInterface $domain)
    {
        $this->domain = $domain;
    }

    public function getProfissionais($especialidade = null)
    {
        return $this->domain->getProfissionais($especialidade);
    }
}