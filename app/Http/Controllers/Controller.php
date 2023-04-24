<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    protected function apiResponse(array $data = [], int $code = 200, string $message = '') {
        if (!$message) {
            $key     = "codeResponse.{$code}";
            $message = trans($key);
        }

        return [
            'success' => $code >= 20000,
            'message' => $message,
            'code'    => $code,
            'data'    => $data,
        ];
    }
}
