<?php
/**
 * Created by PhpStorm.
 * User: mucap
 * Date: 03/03/2019
 * Time: 19:09
 */

namespace Infrastructure\Api\Feegow;


use Contract\Infrastructure\EspecialidadesInfrastructureInterface;

class EspecialidadesInfrastructure extends FeegowBase implements EspecialidadesInfrastructureInterface
{
    public function getEspecialidades()
    {
        return $this->get('/specialties/list');
    }
}