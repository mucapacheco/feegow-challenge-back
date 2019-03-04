<?php

namespace Contract\Domain;

interface FeegowBaseDomainInterface
{
    public function get($url, $params = []);
}