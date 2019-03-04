<?php

namespace Contract\Application;

interface FeegowApplicationInterface
{
    public function get($url, $params = []);
}