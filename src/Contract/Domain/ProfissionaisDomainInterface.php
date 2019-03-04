<?php

namespace Contract\Domain;

interface ProfissionaisDomainInterface
{
    public function getProfissionais($especialidade = null);
}