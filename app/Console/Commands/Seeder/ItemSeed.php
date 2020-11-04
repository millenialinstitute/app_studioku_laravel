<?php

namespace App\Console\Commands\Seeder;

use Illuminate\Console\Command;
use Faker\Factory as Faker;
use App\Item;
use App\ItemTag;
use App\ItemFile;
use App\Contributor;
use App\Category;
use App\Tag;

class ItemSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:item';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for create item dummy data';

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
        $value = $this->ask('How many data for create?');
        $this->info('--------------------- insert item ----------------------------');
        echo "\n";

        function getId($data) {
            $collection = collect([]);
            foreach ($data as $d) {
                $collection->push($d->id);
            }
            return $collection->toArray();
        }

        // get data contributor id
        $contributorsIdData = Contributor::where('status' , 'confirmed')->select('id')->get();
        $contributorsId = getId($contributorsIdData);
        // get data category id
        $categories = getId(Category::get());

        // get data tag id
        $tags = getId(Tag::get());

        for ($i=1; $i <= $value; $i++) { 
            $this->info('------ insert data ' . $i .' -------');
            $item = [
                'contributor_id' => $faker->randomElement($contributorsId),
                'title'          => $faker->sentence($nbWords=3),
                'image'          => $faker->randomElement(['example.jpg', 'example2.jpg' , 'example3.jpg', 'example4.jpg', 'example5.png']),
                'category_id'    => $faker->randomElement($categories),
                'cost'           => $faker->numberBetween($min=1 , $max=10) . '00000',
                'status'         => $faker->randomElement(['waiting' , 'accept']),
                'sold'           => 0,
            ];
            Item::create($item);
            dump($item);

            $tag = [
                'item_id' => Item::get()->last()->id,
                'tag_id'  => $faker->randomElement($tags),
            ];
            ItemTag::create($tag);
            dump($tag);

            $file = [
                'item_id'   => Item::get()->last()->id,
                'name'      => $faker->randomElement(['example.jpg', 'example2.jpg' , 'example3.jpg', 'example4.jpg', 'example5.png']),
                'size'      => $faker->numberBetween($min=1 , $max=20) .'000',
                'extension' => 'jpg',
                'type'      => $faker->randomElement(['file' , 'preview']),
            ];
            ItemFile::create($file);
            dump($file);
        }

        echo "\n\n";
        $this->info('====================== complete ===========================');

    }
}
