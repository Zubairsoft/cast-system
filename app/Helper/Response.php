<?php

use Illuminate\Http\JsonResponse;


/**
 * @param mixed $data=null
 * @param String $msg="ok"
 * @param mixed $status_code=200
 * 
 * @return JsonResponse
 */
function sendSuccessResponse($data = null, String $msg = "ok", $status_code = 200): JsonResponse
{
    $response = [
        'status' => true,
        'message' => $msg,
        'data' => $data,
        'status_code' => $status_code
    ];
    return response()->json($response, $status_code);
}


/**
 * @param mixed $data=null
 * @param String $msg="ok"
 * @param mixed $status_code=200
 * 
 * @return JsonResponse
 */
function sendErrorResponse($data = null, String $msg = "error", $status_code = 404): JsonResponse
{
    $response = [
        'status' => false,
        'data' => $data,
        'message' => $msg,
        'status_code' => $status_code
    ];
    return response()->json($response, $status_code);
}

