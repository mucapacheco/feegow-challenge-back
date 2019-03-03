<?php

use Contract\Infrastructure\AgendamentoInfrastructureInterface;

return [
    'dependencies' => [
        'factories' => [
            AgendamentoInfrastructureInterface::class => function (\Psr\Container\ContainerInterface $di) {
                $em = $di->get(\Doctrine\ORM\EntityManagerInterface::class);
                return new \Infrastructure\Repository\AgendamentoRespository($em);
            },
        ],
    ],
];