<?php

namespace Application;

use Contract\Application\EspecialidadesApplicationInterface;
use Contract\Domain\EspecialidadesDomainInterface;

class EspecialidadesApplication implements EspecialidadesApplicationInterface
{
    private $domain;

    public function __construct(EspecialidadesDomainInterface $domain)
    {
        $this->domain = $domain;
    }

    public function getEspecialidades()
    {
        return $this->domain->getEspecialidades();
    }
}