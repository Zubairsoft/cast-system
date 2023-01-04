<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Artists;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ToggleArtistActivationController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $artist = Artist::query()->findOrFail(id: $id);

        $artist->toggleIsActive();

        return sendSuccessResponse(null, __('messages.data-updating'));
    }
}
