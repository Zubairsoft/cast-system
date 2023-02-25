<?php

namespace App\Console\Commands;

use Domains\User\Action\BlockingAllUserThatEndedSubscriptionAction;
use Domains\User\Action\ListAllUsersThatEndedSubscriptionAction;
use Illuminate\Console\Command;

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

            $countOfUsers = (new BlockingAllUserThatEndedSubscriptionAction)();

            $this->info("blocked  $countOfUsers users");

            return Command::SUCCESS;
        }

        $this->line('show all users that ending subscription');

        $columns = ['name', 'username', 'email'];
        $this->table(
            $columns,
            (new ListAllUsersThatEndedSubscriptionAction)($columns)
        );

        return Command::SUCCESS;
    }
}
