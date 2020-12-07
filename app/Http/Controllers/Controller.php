<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function buildResponse($status, $data, $errors = null)
    {
        return response(
            [
                'success' => $this->parseStatus($status),
                'status_code' => $status,
                'data' => $data,
                'errors' => $errors
            ],
            $status,
        );
    }

    private function parseStatus($status)
    {
        return $status == 200 || $status == 201;
    }

    protected function successResponse($data): Response
    {
        return $this->buildResponse(200, $data);
    }

    protected function errorResponse($status, $errors): Response
    {
        return $this->buildResponse($status, null, $errors);
    }

}
