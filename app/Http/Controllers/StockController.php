<?php


namespace App\Http\Controllers;

use App\Domains\Stock\ApiManager;
use App\Domains\Stock\ParseMap;
use App\Domains\Stock\ResultParser;

class StockController extends Controller
{
    public function __construct(
        private ApiManager $apiManager,
        private ResultParser $parser
    ) { }

    public function getSymbol($symbol)
    {
        try {
            $data = $this->apiManager->getStockInfo($symbol);
            $data = $this->parser->parseResult($data, ParseMap::RESULT_MAP);
            return $this->successResponse($data);
        } catch (\Exception $e) {
            return $this->errorResponse(404, 'DATA NOT FOUND');
        }
    }
}
