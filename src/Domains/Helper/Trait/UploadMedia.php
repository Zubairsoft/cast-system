<?php

namespace Domains\Helper\Trait;

use ErrorException;

trait UploadMedia
{
    private function uploadImage($image_request, $path = '')
    {

        if (is_file($image_request)) {

            return $image_request->storePublicly($path);
        }

        return $path . '/default.png';
    }
}
