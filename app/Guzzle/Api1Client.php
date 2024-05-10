<?php

namespace App\Guzzle;

use App\Exceptions\ApiException;
use Illuminate\Support\Facades\Http;

class Api1Client implements ApiClientInterface
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = "https://run.mocky.io";
    }

    public function getCurrencyRates(): array
    {
        $response = Http::get($this->baseUrl . '/v3/e5056fe0-be6f-48ba-8b51-52ff28f54372');
        if ($response->failed()) {
            throw new ApiException("Failed to fetch currency rates from Api1");
        }
        return $response->json();
    }
}
