<?php


namespace App\Domains\Stock;


class ResultParser
{
    public function parseResult($data, $map)
    {
        $temp = [];
        foreach ($map as $mapVals => $value) {
            if (count($value) == 1) {
                $temp[$mapVals] = $data[$mapVals];
                continue;
            }

            list($k1, $k2) = $value;
            $temp[$mapVals] =  $this->parseRows($data[$k1][$k2], ParseMap::KEY_MAP[$mapVals]);
        }

        return $temp;
    }

    private function parseRows($rows, $key = 'endDate', $keyVal = 'fmt')
    {
        $temp = [];
        foreach ($rows as $row) {
            $k = $row[$key][$keyVal];
            $temp[$k] = $this->parseCols($row);
        }

        return $temp;
    }

    private function parseCols($cols)
    {
        $temp = [];
        foreach ($cols as $c => $val) {
            $temp[$c] = $val;
        }

        return $temp;
    }
}
