<?php

declare(strict_types=1);

namespace AppTest\Domain;

use Contract\Domain\FeegowBaseDomainInterface;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

class FeegowTest extends TestCase
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
        chdir( dirname(dirname(dirname(__DIR__))));
        $this->container =  require getcwd().'/config/container.php';
        $this->faker     = $this->container->get("Faker");
    }

    public function testReturnSpecialtiesList()
    {
        $interface = FeegowBaseDomainInterface::class;
        $this->assertTrue($this->container->has($interface),"Factory não configurada.");
        /**
         * @var FeegowBaseDomainInterface $domain
         */
        $domain = $this->container->get($interface);
        $this->assertInstanceOf($interface,$domain,"Objeto não implementa a interface '{$interface}'.");

        $result = $domain->get('/specialties/list');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('success',$result);
        $this->assertTrue($result['success']);
        //$this->assertNotNull($agendamento->getId());
    }

    public function testReturnProfissionalList()
    {
        $interface = FeegowBaseDomainInterface::class;
        $this->assertTrue($this->container->has($interface),"Factory não configurada.");
        /**
         * @var FeegowBaseDomainInterface $domain
         */
        $domain = $this->container->get($interface);
        $this->assertInstanceOf($interface,$domain,"Objeto não implementa a interface '{$interface}'.");

        $result = $domain->get('/professional/list',["especialidade_id"=>134]);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('success',$result);
        $this->assertTrue($result['success']);
    }

    public function testReturnListSources()
    {
        $interface = FeegowBaseDomainInterface::class;
        $this->assertTrue($this->container->has($interface),"Factory não configurada.");
        /**
         * @var FeegowBaseDomainInterface $domain
         */
        $domain = $this->container->get($interface);
        $this->assertInstanceOf($interface,$domain,"Objeto não implementa a interface '{$interface}'.");

        $result = $domain->get('/patient/list-sources');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('success',$result);
        $this->assertTrue($result['success']);
    }
}
