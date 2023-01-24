<?php

namespace App\Exceptions\Traits;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

trait ConvertToJsonResponse
{
    private function convertToJsonResponse(Throwable $e,$request)
    {
        return match(true){
         $e instanceof NotFoundHttpException => $this->notFoundHttpException(__('exception.not_found_http_exception',[],$request->locale ==='ar'?'ar':'en')),
         default => sendErrorResponse(null,'is_working for : '.get_class($e))
        };
    }

    private function notFoundHttpException($message=null,int $status_code=404)
    {
      return sendErrorResponse(null,$message,$status_code);
    }

    
}