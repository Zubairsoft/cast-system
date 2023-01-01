<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Artists;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ShowArtistController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $company=Auth::user()->company;
        $artist = $company->artists()->findOrFail($id);

        return sendSuccessResponse(
            $artist->load('image'),
            __('messages.data-getting')
        );
    }
}
