<?php

namespace Domains\Wallet\Actions;

use App\Models\Subscription;
use App\Models\Wallet;
use Illuminate\Support\Carbon;

class StatisticsWalletAction
{
    public function __invoke(): array
    {
        $data['total'] = Wallet::query()->get()->sum('amount');
        $data['total_active_subscription'] = Subscription::query()->where('ended_at', '>', Carbon::now())->get()->count();
        $data['total_ended_subscription'] = Subscription::query()->where('ended_at', '<', Carbon::now())->get()->count();

        return $data;
    }
}
