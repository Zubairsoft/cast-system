<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Artists;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Domains\Artists\Actions\IndexArtistAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexArtistController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $artists = (new IndexArtistAction)($request);
        return sendSuccessResponse(
            $artists,
            __('messages.data-getting')
        );
    }
}
