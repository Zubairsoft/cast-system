<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Companies\Artists;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Companies\Artists\UpdateArtistRequest;
use Domains\Artists\Actions\UpdateArtistAction;
use Domains\Artists\DTO\ArtistData;
use Domains\Helper\Trait\UploadMedia;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateArtistController extends Controller
{
    use UploadMedia;

    public function __invoke(UpdateArtistRequest $request, string $id): JsonResponse
    {
       (new UpdateArtistAction)($request,$id);

        return sendSuccessResponse(null, __('messages.data-updating'));
    }
}
