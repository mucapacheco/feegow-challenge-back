<?php

return [
    'dependencies' => [
        'factories' => [
            \Doctrine\ORM\EntityManagerInterface::class => function (\Psr\Container\ContainerInterface $di) {
                $config        = $di->get("config");
                $conn          = $config['doctrine-configuration']['conn'];
                $namespace     = $config['doctrine-configuration']['config'];
                $configuration = \Doctrine\ORM\Tools\Setup::createXMLMetadataConfiguration($namespace, true);
                $entityManager = \Doctrine\ORM\EntityManager::create($conn, $configuration);
                $entityManager->getConnection()->exec("set names 'utf8'");
                return $entityManager;
            },
        ],
    ],
];