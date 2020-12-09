<?php


namespace App\Domains\Stock;


class ParseMap
{
    const RESULT_MAP = [
        'incomeStatementHistory' => ['incomeStatementHistory','incomeStatementHistory'],
        'incomeStatementHistoryQuarterly' => ['incomeStatementHistoryQuarterly','incomeStatementHistory'],
        'cashflowStatementHistory' => ['cashflowStatementHistory','cashflowStatements'],
        'cashflowStatementHistoryQuarterly' => ['cashflowStatementHistoryQuarterly','cashflowStatements'],
        'earnings' => ['earnings'],
        'balanceSheetHistoryQuarterly' => ['balanceSheetHistoryQuarterly','balanceSheetStatements'],
        'earningsHistory' => ['earningsHistory','history'],
        'balanceSheetHistory' => ['balanceSheetHistory','balanceSheetStatements'],
        'financialData' => ['financialData'],
    ];

    const KEY_MAP = [
        'incomeStatementHistory' => 'endDate',
        'incomeStatementHistoryQuarterly' => 'endDate',
        'cashflowStatementHistory' => 'endDate',
        'cashflowStatementHistoryQuarterly' => 'endDate',
        'earnings' => 'endDate',
        'balanceSheetHistoryQuarterly' => 'endDate',
        'earningsHistory' => 'quarter',
        'balanceSheetHistory' => 'endDate',
        'financialData' => 'endDate',
    ];
}
