<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Domains\User\Enums\Subscription\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class WalletSeeder extends Seeder
{
    private $wallets = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wallet::factory()->count(30)->make()->each(function ($wallet) {
            $subscription = $wallet->user->subscriptions()->get()->last();

            if (($subscription->type !== Type::LIMITED ) && ($subscription->ended_at < now())) {
                array_push($this->wallets,$this->attributes($wallet->toArray(),['id','user_id','amount']));
            }

            if ($subscription->type === Type::LIMITED) {

            array_push($this->wallets,$this->attributes($wallet->toArray(),['id','user_id','amount']));
            }
        });

        if (count($this->wallets) > 0) {
            Wallet::query()->insert($this->wallets);
        }
    }

    private function attributes( array $array,array $attributes)
    {
        $result=[];

        foreach ($array as $key => $value) {
            
            if (in_array($key,$attributes)) {
                $result[$key]=$value;
            }
        }

        return $result;

    }
}
