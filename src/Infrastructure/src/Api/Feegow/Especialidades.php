<?php
/**
 * Created by PhpStorm.
 * User: mucap
 * Date: 03/03/2019
 * Time: 19:09
 */

namespace Infrastructure\Api\Feegow;


class Profissionais extends Base
{
    public function getProfissionais()
    {
        return $this->get('/specialties/list');
    }
}