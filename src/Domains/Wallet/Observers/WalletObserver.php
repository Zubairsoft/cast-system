<?php

namespace Domains\Wallet\Observers;

use App\Models\Wallet;
use Carbon\Carbon;
use Domains\User\Enums\Subscription\Type;
use Illuminate\Support\Facades\Log;

use function PHPSTORM_META\type;

class WalletObserver
{
    /**
     * Handle the Wallet "created" event.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return void
     */
    public function created(Wallet $wallet)
    {
        $type = $wallet->amount > 500 ? Type::YEARLY : Type::MONTHLY;
        $user = $wallet->user;
        $user->subscriptions()->make([
            'type' => $type,
            'started_at' => now(),
            'ended_at' => $type === Type::MONTHLY ? addMount() : addYear()
        ])->save();
    }
}
