<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Admin\Wallets;

use App\Http\Controllers\Controller;
use Domains\Wallet\Actions\StatisticsWalletAction;

class StatisticsWalletController extends Controller
{
    public function __invoke()
    {
        $data=(new StatisticsWalletAction)();
        return sendSuccessResponse($data,__('messages.data-getting'));
    }
}
