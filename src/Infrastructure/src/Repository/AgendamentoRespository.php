<?php
/**
 * Created by PhpStorm.
 * User: mucap
 * Date: 03/03/2019
 * Time: 18:19
 */

namespace Infrastructure\Repository;


use Contract\Infrastructure\AgendamentoInfrastructureInterface;
use Doctrine\ORM\EntityManagerInterface;
use Domain\Entity\Agendamento;

class AgendamentoRespository implements AgendamentoInfrastructureInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function agendar(Agendamento $agendamento)
    {
        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($agendamento);
            $this->entityManager->flush();
            $this->entityManager->commit();
            return $agendamento;
        } catch (\Throwable $t) {
            $this->entityManager->rollback();
            throw $t;
        }
    }
}