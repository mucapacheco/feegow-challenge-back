<?php

use Contract\Infrastructure\AgendamentoInfrastructureInterface;
use Contract\Infrastructure\EspecialidadesInfrastructureInterface;
use Contract\Infrastructure\FeegowBaseInterface;
use Contract\Infrastructure\ProfissionaisInfrastructureInterface;
use Infrastructure\Api\Feegow\EspecialidadesInfrastructure;
use Infrastructure\Api\Feegow\ProfissionaisInfrastructure;

return [
    'feegow' => [
        'url' => 'http://clinic5.feegow.com.br/components/public/api',
        'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38',
    ],
    'dependencies' => [
        'factories' => [
            AgendamentoInfrastructureInterface::class => function (\Psr\Container\ContainerInterface $di) {
                $em = $di->get(\Doctrine\ORM\EntityManagerInterface::class);
                return new \Infrastructure\Repository\AgendamentoRespository($em);
            },
            ProfissionaisInfrastructureInterface::class => function (\Psr\Container\ContainerInterface $di) {
                $config = $di->get("config")['feegow'];
                return new ProfissionaisInfrastructure($config['url'], $config['token']);
            },
            EspecialidadesInfrastructureInterface::class => function (\Psr\Container\ContainerInterface $di) {
                $config = $di->get("config")['feegow'];
                return new EspecialidadesInfrastructure($config['url'], $config['token']);
            },
            FeegowBaseInterface::class => function (\Psr\Container\ContainerInterface $di) {
                $config = $di->get("config")['feegow'];
                return new Infrastructure\Api\Feegow\FeegowBase($config['url'], $config['token']);
            },
        ],
    ],
];