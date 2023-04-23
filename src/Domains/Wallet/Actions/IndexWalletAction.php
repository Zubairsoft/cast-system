<?php

namespace Domains\Wallet\Actions;

use App\Models\Wallet;
use Illuminate\Http\Request;

class IndexWalletAction
{
    public function __invoke(Request $request)
    {
        $sortByAttributes = ['created_at', 'id'];

        $sortAttributes = ['desc', 'asc'];

        $perPage = $request->input('perPage') ?? 5;

        $sort = in_array($request->input('sort'), $sortAttributes) ? $request->input('sort') : Wallet::DEFAULT_SORTED ?? Wallet::DEFAULT_SORTED;

        $sortBy = in_array($request->input('sortBy'), $sortByAttributes) ? $request->input('sortBy') : Wallet::DEFAULT_SORTED_BY ?? Wallet::DEFAULT_SORTED_BY;

        $wallets = Wallet::query()->with([
            'user',
            'user.subscriptions'
        ])->orderBy($sortBy, $sort)->paginate($perPage);
        
        return $wallets;
    }
}
