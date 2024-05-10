<?php

namespace App\Http\Controllers;

use App\Guzzle\Api1Client;
use App\Guzzle\Api2Client;
use App\Models\Currencies;
use Illuminate\Http\Request;
use App\Services\CurrencyService;

class CurrencyController extends Controller
{
    public function compareCurrencies()
    {
        $cheapestList=Currencies::all();
        return view('currency', compact('cheapestList'));
    }
}
