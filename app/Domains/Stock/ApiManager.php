<?php


namespace App\Domains\Stock;


use GuzzleHttp\Client;

class ApiManager
{
    const API_URL = 'https://yahoo-finance-low-latency.p.rapidapi.com/v11/finance/quoteSummary';
    const MODULES = [
        'financialData',
        'incomeStatementHistory',
        'incomeStatementHistoryQuarterly',
        'cashflowStatementHistory',
        'cashflowStatementHistoryQuarterly',
        'balanceSheetHistory',
        'balanceSheetHistoryQuarterly',
        'earnings',
        'earningsHistory',
    ];

    public function __construct(
        private Client $client
    ) { }

    private function getHeaders(): array
    {
        return [
            'x-rapidapi-key' => env('RAPID_API_KEY'),
            'x-rapidapi-host' => 'yahoo-finance-low-latency.p.rapidapi.com'
        ];
    }

    private function getQuery(): array
    {
        return [
            'modules' => implode(',', self::MODULES)
        ];
    }

    public function getStockInfo($symbol)
    {
        $resultData = $this->client->get(self::API_URL.'/'.$symbol, [
            'headers' => $this->getHeaders(),
            'query' => $this->getQuery()
        ])
        ->getBody()
        ->getContents();

        return $this->getResult($resultData);
    }

    private function getResult($resultData)
    {
        return json_decode($resultData)
            ->quoteSummary
            ->result;
    }
}
