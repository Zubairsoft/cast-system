<?php

namespace App\Console\Commands;

use App\Models\User;
use Domains\User\Enums\Status;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class CheckSubscriptionEndedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:ended  {--block} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command check subscription in the application';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        if ($this->option('block')) {

            $this->line("deactivate all users that subscription is ending");

            $countOfUsers = User::query()->whereHas('subscription', fn (Builder $query) => $query->where('ended_at', '<', Carbon::now()))->update(['status' => Status::BLOCKED]);

            $this->info("blocked  $countOfUsers users");

            return Command::SUCCESS;
        }

        $this->line('show all users that ending subscription');

        $this->table(
            ['name', 'username', 'email'],
            User::query()->whereHas('subscription', fn (Builder $query) => $query->where('ended_at', '<', Carbon::now()))->get(['name', 'username', 'email'])->toArray()

        );

        return Command::SUCCESS;
    }
}
