<?php


namespace App\Http\Controllers;

use App\Domains\Stock\ApiManager;
use App\Domains\Stock\StockInformationFetcher;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct(
        private ApiManager $apiManager
    ) { }

    public function getSymbol(Request $request, $symbol)
    {
        try {
            $data = $this->apiManager->getStockInfo($symbol);
            return $this->successResponse($data);
        } catch (\Exception $e) {
            return $this->errorResponse(404, 'DATA NOT FOUND');
        }
    }
}
