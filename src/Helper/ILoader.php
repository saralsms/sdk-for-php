<?php

namespace SaralSMS\Helper;

interface ILoader
{
    public function __construct();

    public function getEnv($key, $default = '');

    public function setEnv($key, $val);
}
