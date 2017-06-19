<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Authentication;

class Auther extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Auther:data';

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
        $sign = 50000;
        for($j=1;$j<=200;$j++){
            $data = [];
            $num = 9;
            for($i=$sign-50000+1;$i<=$sign;$i++){
                $i_num = strlen($i);
                $rand = rand(100000000,999999999);
                $idnumber = $rand . substr($rand,0,$num-$i_num) . $i;
                $data[$i] = [
                    'username' => "程序猿".$i,
                    'idnumber' => $idnumber,
                    'status' => 0,
                    'user_id' => $i,
                ];
            }
            for($i=$sign-50000+1;$i<=$sign;$i++){
                Authentication::insert($data[$i]);
            }
            $sign = $sign + 50000;
        }
    }
}
