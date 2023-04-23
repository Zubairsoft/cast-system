<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Wallets;

use App\Http\Controllers\Controller;
use Domains\Wallet\Actions\IndexWalletAction;
use Illuminate\Http\Request;

class IndexWalletController extends Controller
{
    public function __invoke(Request $request)
    {
        $wallets=(new IndexWalletAction)($request);
        return sendSuccessResponse($wallets, __('messages.data-getting'));
    }
}
