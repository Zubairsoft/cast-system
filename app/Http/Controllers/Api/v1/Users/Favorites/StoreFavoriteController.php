<?php

namespace App\Http\Controllers\Api\v1\Users\Favorites;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Favorites\StoreFavoriteRequest;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreFavoriteController extends Controller
{
    public function __invoke(int $id)
    {

    }
}
