<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Profile;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

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
        $sign = '50000';
        $arr1 = ['A','B', 'C', 'D', 'E', 'F', 'G','H', 'I','J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q','R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l' ,'m' ,'n', 'o', 'p', 'q','r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',1,2,3,4,5,6,7,8,9];
        $arr2 = array(
            130,131,132,133,134,135,136,137,138,139,
            144,147,
            150,151,152,153,155,156,157,158,159,
            176,177,178,
            180,181,182,183,184,185,186,187,188,189,
        );
        for($ii=1;$ii<=200;$ii++){
            $user_data = [];
            $data = [];
            for($i=$sign-50000+1;$i<=$sign;$i++){
                $phone = $arr2[array_rand($arr2)] . rand(1000,9999) . rand(1000,9999);
                $rand = rand(6,15);
                $name = '';
                for ($j=0;$j<$rand;$j++) {
                    if ($j!=0) {
                        $name.=$arr1[rand(0,60)];
                    } else {
                        $name.=$arr1[rand(0,51)];
                    }
                }
                $user_data[$i] = [
                    'username' => $name,
                    'password' => md5('123'),
                    'phone' => $phone,
                    'pwdlevel' => '0',
                ];
                $data[$i] = [
                    'user_id' => $i,
                    'phone' => $phone,
                    'register_date' => date('Y-m-d H:i:s'),
                    'last_logintime' => date('Y-m-d H:i:s'),
                    'last_ip' => '127.0.0.1',
                    'head' => 'images/touxiang.png',
                ];
            }
            for($i=$sign-50000+1;$i<=$sign;$i++){
                $user_id = User::insert($user_data[$i]);
                $res = Profile::insert($data[$i]);
            }
            $sign = $sign + 50000;
        }
    }
}
