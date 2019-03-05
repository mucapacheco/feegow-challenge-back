<?php

declare(strict_types=1);

namespace AppTest\Domain;


use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

class InstallTest extends TestCase
{
    /** @var ContainerInterface|ObjectProphecy */
    protected $container;

    /** @var RouterInterface|ObjectProphecy */
    protected $router;
    /**
     * @var Generator
     */
    protected $faker;

    protected function setUp()
    {
        define('APP_TEST',true);
        chdir(dirname(dirname(dirname(__DIR__))));
        $this->container = require getcwd() . '/config/container.php';
        $this->faker = $this->container->get("Faker");
    }


    public function testInstall()
    {
        $domain = $this->container->get('INSTALL-DOCTRINE');
        $this->assertEquals("Instalação realizada com sucesso.", $domain(true));
    }
}
