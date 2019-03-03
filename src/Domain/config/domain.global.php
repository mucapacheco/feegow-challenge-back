<?php

use Contract\Domain\AgendamentoDomainInterface;
use Contract\Infrastructure\AgendamentoInfrastructureInterface;
use Domain\Service\AgendamentoDomain;

return [
    'dependencies' => [
        'factories' => [
            AgendamentoDomainInterface::class => function (\Psr\Container\ContainerInterface $di) {
                $infra = $di->get(AgendamentoInfrastructureInterface::class);
                return new AgendamentoDomain($infra);
            },
        ],
    ],
];