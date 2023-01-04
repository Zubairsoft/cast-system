<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Artists;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToggleArtistActivationController extends Controller
{
    /**
     * Handel the incoming request 
     *
     * @param string $id
     * @return JsonResponse
     */
    public function __invoke(string $id): JsonResponse
    {
        $company = Auth::user()->company;

        $artist = $company->artists()->findOrFail(id: $id);

        $artist->toggleIsActive();

        return sendSuccessResponse(null, __('messages.data-updating'));
    }
}
