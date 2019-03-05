<?php

namespace Infrastructure\Api\Feegow;


use Contract\Infrastructure\EspecialidadesInfrastructureInterface;

class EspecialidadesInfrastructure extends FeegowBase implements EspecialidadesInfrastructureInterface
{
    public function getEspecialidades()
    {
        return $this->get('/specialties/list');
    }
}