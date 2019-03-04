<?php

use Contract\Domain\AgendamentoDomainInterface;
use Contract\Domain\EspecialidadesDomainInterface;
use Contract\Domain\FeegowBaseDomainInterface;
use Contract\Domain\ProfissionaisDomainInterface;
use Contract\Infrastructure\AgendamentoInfrastructureInterface;
use Contract\Infrastructure\EspecialidadesInfrastructureInterface;
use Contract\Infrastructure\FeegowBaseInterface;
use Contract\Infrastructure\ProfissionaisInfrastructureInterface;
use Domain\Service\AgendamentoDomain;
use Domain\Service\EspecialidadesDomain;
use Domain\Service\FeegowDomain;
use Domain\Service\ProfissionaisDomain;
use Psr\Container\ContainerInterface;

return [
    'dependencies' => [
        'factories' => [
            AgendamentoDomainInterface::class => function (ContainerInterface $di) {
                $infra = $di->get(AgendamentoInfrastructureInterface::class);
                return new AgendamentoDomain($infra);
            },
            EspecialidadesDomainInterface::class => function (ContainerInterface $di) {
                $infra = $di->get(EspecialidadesInfrastructureInterface::class);
                return new EspecialidadesDomain($infra);
            },
            ProfissionaisDomainInterface::class => function (ContainerInterface $di) {
                $infra = $di->get(ProfissionaisInfrastructureInterface::class);
                return new ProfissionaisDomain($infra);
            },
            FeegowBaseDomainInterface::class => function (ContainerInterface $di) {
                $infra = $di->get(FeegowBaseInterface::class);
                $path = [
                    '/specialties/list',
                    '/patient/list-sources',
                    '/professional/list',
                ];
                return new FeegowDomain($infra, $path);
            },
        ],
    ],
];