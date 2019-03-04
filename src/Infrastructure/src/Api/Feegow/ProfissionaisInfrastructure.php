<?php

namespace Infrastructure\Api\Feegow;

use Contract\Infrastructure\ProfissionaisInfrastructureInterface;

class ProfissionaisInfrastructure extends FeegowBase implements ProfissionaisInfrastructureInterface
{
    public function getProfissionais($especialidade = null)
    {
        $params = [];
        if ($especialidade) {
            $params['especialidade_id'] = $especialidade;
        }

        return $this->get('/professional/list', $params);
    }
}