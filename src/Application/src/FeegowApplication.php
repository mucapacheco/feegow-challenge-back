<?php

namespace Application;

use Contract\Application\EspecialidadesApplicationInterface;
use Contract\Application\FeegowApplicationInterface;
use Contract\Domain\EspecialidadesDomainInterface;
use Contract\Domain\FeegowBaseDomainInterface;

class FeegowApplication implements FeegowApplicationInterface
{
    private $domain;

    public function __construct(FeegowBaseDomainInterface $domain)
    {
        $this->domain = $domain;
    }

    public function get($url, $params = [])
    {
        return $this->domain->get($url, $params);
    }


}