<?php

namespace Contract\Infrastructure;

interface FeegowBaseInterface
{
    public function get($url, $params = []);
}