<?php

use Application\AgendamentoApplication;
use Application\EspecialidadesApplication;
use Application\FeegowApplication;
use Application\ProfissionaisApplication;
use Contract\Application\AgendamentoApplicationInterface;
use Contract\Application\EspecialidadesApplicationInterface;
use Contract\Application\FeegowApplicationInterface;
use Contract\Application\ProfissionaisApplicationInterface;
use Contract\Domain\AgendamentoDomainInterface;
use Contract\Domain\EspecialidadesDomainInterface;
use Contract\Domain\FeegowBaseDomainInterface;
use Contract\Domain\ProfissionaisDomainInterface;
use Psr\Container\ContainerInterface;

return [
    'dependencies' => [
        'factories' => [
            AgendamentoApplicationInterface::class => function (ContainerInterface $di) {
                $domain = $di->get(AgendamentoDomainInterface::class);
                return new AgendamentoApplication($domain);
            },
            ProfissionaisApplicationInterface::class => function (ContainerInterface $di) {
                $domain = $di->get(ProfissionaisDomainInterface::class);
                return new ProfissionaisApplication($domain);
            },
            EspecialidadesApplicationInterface::class => function (ContainerInterface $di) {
                $domain = $di->get(EspecialidadesDomainInterface::class);
                return new EspecialidadesApplication($domain);
            },
            FeegowApplicationInterface::class => function (ContainerInterface $di) {
                $domain = $di->get(FeegowBaseDomainInterface::class);
                return new FeegowApplication($domain);
            },
        ],
    ],
];