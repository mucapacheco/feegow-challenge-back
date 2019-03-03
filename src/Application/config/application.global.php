<?php

use Application\AgendamentoApplication;
use Contract\Application\AgendamentoApplicationInterface;
use Contract\Domain\AgendamentoDomainInterface;
use Psr\Container\ContainerInterface;

return [
    'dependencies' => [
        'factories' => [
            AgendamentoApplicationInterface::class => function (ContainerInterface $di) {
                $domain = $di->get(AgendamentoDomainInterface::class);
                return new AgendamentoApplication($domain);
            },
        ],
    ],
];