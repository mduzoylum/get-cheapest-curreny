<?php

namespace App\Guzzle;

interface ApiClientInterface
{
    public function getCurrencyRates() : array;
}
