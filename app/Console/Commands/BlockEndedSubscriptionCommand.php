<?php

namespace App\Console\Commands;

use App\Models\User;
use Domains\User\Action\BlockingAllUserThatEndedSubscriptionAction;
use Illuminate\Console\Command;

class BlockEndedSubscriptionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:block';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'block all users that ending subscription';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count_of_blocking_users = (new BlockingAllUserThatEndedSubscriptionAction)();

        $this->info("the count of blocking user is $count_of_blocking_users");

        return Command::SUCCESS;
    }
}
