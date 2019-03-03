<?php
/**
 * Created by PhpStorm.
 * User: mucap
 * Date: 03/03/2019
 * Time: 19:09
 */

namespace Infrastructure\Api\Feegow;


class Especialidades extends Base
{
    public function getEspecialidades()
    {
        return $this->get('/specialties/list');
    }
}