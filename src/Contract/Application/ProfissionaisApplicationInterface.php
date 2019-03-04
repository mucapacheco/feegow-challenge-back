<?php

namespace Contract\Application;

interface ProfissionaisApplicationInterface
{
    public function getProfissionais($especialidade = null);
}