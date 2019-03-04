<?php

declare(strict_types=1);

namespace AppTest\Handler;

use App\Handler\HomePageHandler;
use Contract\Domain\AgendamentoDomainInterface;
use Domain\Entity\Agendamento;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Presentation\Handler\AgendamentoHandler;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Container\ContainerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router\RouterInterface;

class AgendamentoHandlerTest extends TestCase
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
        chdir( dirname(dirname(dirname(__DIR__))));
        $this->container =  require getcwd().'/config/container.php';
        $this->faker     = $this->container->get("Faker");
    }


    public function testReturnsJsonResponseWhenNoTemplateRendererProvided()
    {
        $interface = AgendamentoDomainInterface::class;

        $this->assertTrue($this->container->has($interface),"Factory não configurada.");
        /**
         * @var AgendamentoDomainInterface $domain
         */
        $domain = $this->container->get($interface);
        $this->assertInstanceOf($interface,$domain,"Objeto não implementa a interface '{$interface}'.");

        $agendamento = new Agendamento();
        $agendamento->setCpf($this->faker->cpf(false));
        $agendamento->setName($this->faker->name);
        $agendamento->setProfessionalId($this->faker->randomNumber(2));
        $agendamento->setSourceId($this->faker->randomNumber(2));
        $agendamento->setSpecialtyId($this->faker->randomNumber(2));

        $domain->agendar($agendamento);
        $this->assertNotNull($agendamento->getId());
    }
}
