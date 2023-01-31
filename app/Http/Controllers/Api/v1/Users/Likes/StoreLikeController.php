<?php

namespace App\Http\Controllers\Api\v1\Users\Likes;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class StoreLikeController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {

    }
}
