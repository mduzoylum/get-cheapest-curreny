<?php

namespace App\Guzzle;

use App\Exceptions\ApiException;
use Illuminate\Support\Facades\Http;

class Api2Client implements ApiClientInterface
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = "https://run.mocky.io";
    }

    public function getCurrencyRates(): array
    {
        $response = Http::get($this->baseUrl . '/v3/7698a8d8-ec93-4df2-9181-ff0504078f81');
        if ($response->failed()) {
            throw new ApiException("Failed to fetch currency rates from Api2");
        }
        return $response->json();
    }
}
