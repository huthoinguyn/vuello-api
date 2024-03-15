<?php

namespace App\Http\Helpers\Trait;

use Illuminate\Http\JsonResponse;

trait ResponseTrait{

    /**
     * Return a success JSON response.
     *
     * @param mixed $data
     * @param mixed $message
     * @param mixed $code
     *
     * @return JsonResponse
     */
    public function successResponse($data, $message = NULL, $code = 200)
    : JsonResponse{
        return response()->json([
            'status'  => 'success',
            'message' => $message,
            'data'    => $data
        ], $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param mixed $message
     * @param mixed $code
     *
     * @return JsonResponse
     */
    public function errorResponse($message, $code)
    : JsonResponse{
        return response()->json([
            'status'  => 'error',
            'message' => $message
        ], $code);
    }
}
