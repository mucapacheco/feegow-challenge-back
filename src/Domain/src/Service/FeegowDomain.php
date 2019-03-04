<?php

namespace Domain\Service;

use Contract\Domain\EspecialidadesDomainInterface;
use Contract\Domain\FeegowBaseDomainInterface;
use Contract\Infrastructure\EspecialidadesInfrastructureInterface;
use Contract\Infrastructure\FeegowBaseInterface;

class FeegowDomain implements FeegowBaseDomainInterface
{
    private $infra;
    private $pathAutorizados;

    public function __construct(FeegowBaseInterface $infra, $pathAutorizados = [])
    {
        $this->infra = $infra;
        $this->pathAutorizados = $pathAutorizados;
    }

    public function get($url, $params = [])
    {
        if (!in_array($url, $this->pathAutorizados)) {
            throw new \Exception("Consulta não autorizada.");
        }

        return $this->infra->get($url, $params);
    }
}