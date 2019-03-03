<?php

use Presentation\Handler\AgendamentoHandler;

return [
    'dependencies' => [
        'factories' => [
            AgendamentoHandler::class => function (\Psr\Container\ContainerInterface $di) {
                $app = $di->get(\Contract\Application\AgendamentoApplicationInterface::class);
                return new AgendamentoHandler($app);
            },
        ],
    ],
];