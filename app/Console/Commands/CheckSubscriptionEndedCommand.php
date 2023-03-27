<?php

namespace App\Console\Commands;

use Domains\User\Action\Commands\BlockingAllUserThatEndedSubscriptionAction;
use Domains\User\Action\Commands\LimitedAllUserThatEndedSubscriptionAction;
use Domains\User\Action\Commands\ListAllUsersThatEndedSubscriptionAction;
use Illuminate\Console\Command;

class CheckSubscriptionEndedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:ended  {--block}{--limited} ';

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

        match (true) {
            $this->option('block') => $this->blockedAllUserThatEndingSubscription(),
            $this->option('limited') => $this->LimitedAllUserThatEndingSubscription(),
            default => $this->listAllUserThatEndedSubscription(['name', 'email'])
        };

        return Command::SUCCESS;
    }

    private function listAllUserThatEndedSubscription(array $columns): void
    {
        $this->line('show all users that ending subscription');

        $this->table(
            $columns,
            (new ListAllUsersThatEndedSubscriptionAction)($columns)
        );
    }

    private function blockedAllUserThatEndingSubscription(): void
    {
        $countOfUsers = (new BlockingAllUserThatEndedSubscriptionAction)();

        $this->info("blocked  $countOfUsers users");
    }

    private function LimitedAllUserThatEndingSubscription(): void
    {
        $countOfUsers = (new LimitedAllUserThatEndedSubscriptionAction)();

        $this->info("Limited  $countOfUsers users");
    }
}
