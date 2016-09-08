<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class LogTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uni:logtime {user} {opt}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Logs employee time (in/out)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $userId = $this->argument('user');
        $opt = $this->argument('opt');

        $user = User::find($userId);

        if(!$user) {
            echo "user-not-found";
            return 1;
        }
        $result = $user->logTime(date('Y-m-d H:i:s'));
        return 0;
    }
}
