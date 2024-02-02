<?php

namespace App\Builder;

use Exception;
use Illuminate\Http\JsonResponse;


class ResponseApi
{

    public static function messageResponse(bool $error, string $message, ?string $execption, $data, int $codeHTTP): JsonResponse
    {
        $response = [
            'error' => $error,
            'message' => $message,
            'execption' => $execption,
            'data' => $data
        ];
        return response()->json($response, $codeHTTP, [], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
    public static function Success(string $message, $data = null, int $codeHTTP = 200): JsonResponse
    {
        return self::messageResponse(false, $message, null, $data, $codeHTTP);
    }
    public static function Error(string $message, ?string $execption = null, int $codeHTTP = 400): JsonResponse
    {
        return self::messageResponse(true, $message, $execption, null, $codeHTTP);
    }
}
