<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Artists;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyArtistController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $company = Auth::user()->company;
        $artist = $company->artists()->findOrFail($id);
        $artist->delete();

        return sendSuccessResponse(null, __('messages.data-deleting'));
    }
}
