<?php

declare(strict_types=1);

namespace AppTest\Handler;

use App\Handler\HomePageHandler;
use Contract\Domain\AgendamentoDomainInterface;
use Domain\Entity\Agendamento;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Presentation\Handler\AgendamentoHandler;
use Presentation\Handler\InstallHandler;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Container\ContainerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router\RouterInterface;

class InstallHandlerTest extends TestCase
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
        chdir(dirname(dirname(dirname(__DIR__))));
        $this->container = require getcwd() . '/config/container.php';
        $this->faker = $this->container->get("Faker");
    }


    public function testInstall()
    {
        $path = getcwd() . "/data/db.sqlite";
        if(file_exists($path)){
            unlink($path);
        }
        $domain = $this->container->get('INSTALL-DOCTRINE');
        $this->assertEquals("Instalação realizada com sucesso.", $domain($path));
    }
}
