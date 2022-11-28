<?php

namespace Domains\Helper\Trait;

use ErrorException;

trait UploadMedia
{
    /**
     * function that save image
     * 
     * @param mixed $image_request 
     * @param string $path 
     * 
     * @return string
     */
    private function uploadImage($image_request, $path = '')
    {

        if (is_file($image_request)) {

            return $image_request->storePublicly($path);
        }

        return $path . '/default.png';
    }
}
