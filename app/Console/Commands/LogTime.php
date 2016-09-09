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
    protected $signature = 'uni:logtime {user}';

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

        $user = User::find($userId);

        if(!$user) {
            echo "user-not-found";
            return 1;
        }
        $result = $user->logTime(date('Y-m-d H:i:s'));
        if($result['result']=='error') {
            return 90;
        }

        switch($result['action']) {
            case 'login':
                return 2;
                break;
            case 'logout':
                return 3;
                break;
        }
        return 0;
    }
}
