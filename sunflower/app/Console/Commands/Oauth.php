<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Oauth_user;

class Oauth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Oauth:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $sign = 500;
        for($j=1;$j<=20000;$j++){
            $data = [];
            for($i=$sign-500+1;$i<=$sign;$i++){
                $rand = rand(10000000,99999999);
                $data[$i] = [
                    'oauth_user_id' => md5($rand),
                    'oauth_id' => 3,
                    'user_id' => $i,
                    'datetime' => date('Y-m-d H:i:s'),
                ];
            }
            Oauth_user::insert($data);
            $sign = $sign + 500;
        }
    }
}
