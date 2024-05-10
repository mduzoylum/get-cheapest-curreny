<?php

namespace App\Services;

use App\Guzzle\ApiClientInterface;
use App\Models\Currencies;

class CurrencyService
{
    private $apiClients;

    public function setApiClients(array $apiClients)
    {
        $this->apiClients = $apiClients;
    }

    public function compareAndSave(): array
    {
        $cheapestList = [];
        foreach ($this->apiClients as $api) {
            foreach ($api->getCurrencyRates() as $currencyList) {
                foreach ($currencyList as $currency) {
                    $code = $currency['shortCode'] ?? $currency['code'];
                    $price = $currency['price'] ?? $currency['amount'];
                    if (!isset($cheapestList[$code]) || $cheapestList[$code] > $price) {
                        $cheapestList[$code] = $price;
                    }
                }
            }
        }
        foreach ($cheapestList as $code => $price) {
            Currencies::updateOrCreate(
                ['name' => $code],
                ['rate' => $price]
            );
        }
        return $cheapestList;
    }
}
