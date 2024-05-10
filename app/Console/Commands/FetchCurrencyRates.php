<?php

namespace App\Console\Commands;

use App\Guzzle\Api1Client;
use App\Guzzle\Api2Client;
use Illuminate\Console\Command;
use App\Services\CurrencyService;
use App\Guzzle\ApiClientInterface;

class FetchCurrencyRates extends Command
{
    protected $signature = 'currency:fetch';
    protected $description = 'Fetch currency rates from APIs and store them in database';

    private $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        parent::__construct();
        $this->currencyService = $currencyService;
    }

    public function handle()
    {
        $apiClients = [
            app()->make(Api1Client::class),
            app()->make(Api2Client::class),
            // Add more API clients here if needed
        ];

        $this->currencyService->setApiClients($apiClients);
        $this->currencyService->compareAndSave();

        $this->info('Currency rates fetched and saved successfully! Time: '. now());
    }
}
