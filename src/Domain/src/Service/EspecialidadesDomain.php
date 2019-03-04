<?php

namespace Domain\Service;

use Contract\Domain\EspecialidadesDomainInterface;
use Contract\Infrastructure\EspecialidadesInfrastructureInterface;

class EspecialidadesDomain implements EspecialidadesDomainInterface
{
    private $infra;

    public function __construct(EspecialidadesInfrastructureInterface $infra)
    {
        $this->infra = $infra;
    }

    public function getEspecialidades()
    {
        return $this->infra->getEspecialidades();
    }

}