<?php

namespace App\Console\Commands\Seeder;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Member;
use App\Contributor;
use Faker\Factory as Faker;

class ContributorSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:contributor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for creating dummy data contributor';

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
        $faker = Faker::create('id_ID');
        $value =  $this->ask('How many data for create?');
        $this->info('--------------------------- insert contributor ----------------------');
        echo "\n";

        for ($i=1; $i <= $value; $i++) { 
            $this->info('------------ insert data ' . $i . ' ------------');
            $user = [
                'name'              => $faker->name,
                'email'             => $faker->unique()->safeEmail,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password'          => Hash::make('member123'),
                'remember_token'    => Str::random(10),
                'level_user_id'     => 2,
            ];
            User::create($user);
            dump($user);

            $member = [
                'user_id' => User::get()->last()->id,
                'address' => $faker->address,
                'bio' =>  $faker->sentence($nbWords=20 , $variableNbWords = true)
            ];
            Member::create($member);
            dump($member);

            $contributor = [
                'user_id' => User::get()->last()->id,
                'status'  => $faker->randomElement(['waiting' , 'confirmed' , 'reject']),
                'saldo'   => 0,
            ];
            Contributor::create($contributor);
            dump($contributor);
            echo "\n\n";
        }

        echo "\n\n";
        $this->info('============================================== complete ==========================================');
    }
}
