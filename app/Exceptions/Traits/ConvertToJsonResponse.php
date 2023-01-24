<?php

namespace App\Exceptions\Traits;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

trait ConvertToJsonResponse
{
    private function convertToJsonResponse(Throwable $e, $request)
    {
        return match (true) {
            $e instanceof NotFoundHttpException => $this->notFoundHttpException(__('exception.not_found_http_exception', [], $this->handleLocalization($request))),
            $e instanceof ModelNotFoundException => $this->modelNotFoundException(__('exception.not_found_model_exception', [], $this->handleLocalization($request))),
            $e instanceof AuthenticationException => $this->userNotAuthorizeException(__('exception.not_authorize',[],$this->handleLocalization($request))),
            default => sendErrorResponse(null, 'is_working for : ' . get_class($e))
        };
    }

    private function notFoundHttpException($message = null, int $status_code = 404)
    {
        return sendErrorResponse(null, $message, $status_code);
    }

    private function modelNotFoundException($message = null, int $status_code = 404)
    {
        return sendErrorResponse(null, $message, $status_code);
    }

    private function userNotAuthorizeException($message = null, int $status_code = 401)
    {
        return sendErrorResponse(null, $message, $status_code);
    }

    private function handleLocalization($request): string
    {
        return $request->locale === 'ar' ? 'ar' : 'en';
    }
}
