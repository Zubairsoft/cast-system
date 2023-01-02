<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Artists;

use App\Http\Controllers\Controller;
use Auth;
use Domains\Artists\Actions\DestroyArtistAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyArtistController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        (new DestroyArtistAction)($id);
        return sendSuccessResponse(null, __('messages.data-deleting'));
    }
}
