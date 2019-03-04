<?php

use Contract\Application\AgendamentoApplicationInterface;
use Contract\Application\EspecialidadesApplicationInterface;
use Contract\Application\ProfissionaisApplicationInterface;
use Presentation\Handler\AgendamentoHandler;
use Presentation\Handler\EspecialidadesHandler;
use Presentation\Handler\FeegowGenericHandler;
use Presentation\Handler\ProfissionaisHandler;
use Psr\Container\ContainerInterface;

return [
    'dependencies' => [
        'factories' => [
            AgendamentoHandler::class => function (ContainerInterface $di) {
                $app = $di->get(AgendamentoApplicationInterface::class);
                return new AgendamentoHandler($app);
            },
            ProfissionaisHandler::class => function (ContainerInterface $di) {
                $app = $di->get(ProfissionaisApplicationInterface::class);
                return new ProfissionaisHandler($app);
            },
            EspecialidadesHandler::class => function (ContainerInterface $di) {
                $app = $di->get(EspecialidadesApplicationInterface::class);
                return new EspecialidadesHandler($app);
            },
            FeegowGenericHandler::class => function (ContainerInterface $di) {
                $app = $di->get(\Contract\Application\FeegowApplicationInterface::class);
                return new FeegowGenericHandler($app);
            },
        ],
    ],
];