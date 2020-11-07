<?php

namespace App\Console\Commands\Seeder;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Bank;
use App\Tag;
use App\Cart;
use App\Contributor;
use App\Collection;
use App\Item;
use App\ItemReject;
use App\OwnedItem;
use App\ProofPayment;
use App\SaldoStatistic;
use App\EarningStatistic;

class DeleteDataDummy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Data Dummy';

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
        $confirm = $this->confirm('Are you sure will delete all data dummy?');
        // delete data in db
        User::where('id' , '>' , 10)->delete();
        Bank::where('id' , '>' , 0)->delete();
        Tag::where('id' , '>' , 0)->delete();
        Cart::where('id' , '>' , 0)->delete();
        Collection::where('id' , '>' , 0)->delete();
        Item::where('id' , '>' , 0)->delete();
        ItemReject::where('id' , '>' , 0)->delete();
        OwnedItem::where('id' , '>' , 0)->delete();
        ProofPayment::where('id' , '>' , 0)->delete();
        SaldoStatistic::where('id' , '>' , 0)->delete();
        EarningStatistic::where('id' , '>' , 0)->delete();


        // Delete storage
        function deleteFiles($files , $directory , $default = 'default' ) {
            if($default === 'default') {
                $default = collect([]);
            }
            dump($directory);
            foreach ($files as $file) {
                $nameFile = str_replace($directory, '', $file);
                if(!$default->contains($nameFile)) {
                    dump("delete file => " . $nameFile);
                    Storage::delete($file);
                } else {
                    dump('default => ' . $nameFile);
                }
            }

            echo "\n";
        }
        $items = Storage::allFiles('public/items');
        deleteFiles($items , 'public/items/' , collect(['example.png']));
        $photos = Storage::allFiles('public/photos');
        deleteFiles($photos , 'public/photos/' , collect(['example.jpg' , 'example2.jpg' , 'example3.jpg' , 'example4.jpg' , 'example5.png']));
        $proofs = Storage::allFiles('public/proofs');
        deleteFiles($proofs , 'public/proofs/');
        $usersImage = Storage::allFiles('public/users');
        deleteFiles($usersImage , 'public/users/' , collect(['user.jpg']));

        // reset data
        Contributor::where('id' , 1)->update(['saldo' => 0]);

        $this->info('------------------ complete ------------------');
        echo "\n\n\n";

    }
}
