<?php

namespace App\Console\Commands;

use App\Services\GuestUserService;
use Illuminate\Console\Command;

class GuestUserCheck extends Command
{
    public function __construct(protected GuestUserService $guestUserService)
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guest-user:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes guest user accounts if time limit has expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deletedUserIds = $this->guestUserService->deleteExpiredAccounts();
        $msg = 'Deleted guest user account IDs: ' . ($deletedUserIds ? implode(',', $deletedUserIds) : 'None');

        $this->info($msg);
    }
}
