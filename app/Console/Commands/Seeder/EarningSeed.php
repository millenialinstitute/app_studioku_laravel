<?php

namespace App\Console\Commands\Seeder;

use Illuminate\Console\Command;
use Faker\Factory as Faker;
use App\Cart;
use App\CartItem;
use App\Bank;
use App\ProofPayment;
use App\Member;
use App\Item;
use App\Contributor;
use App\SaldoStatistic;
use App\SaldoItem;
use App\EarningStatistic;
use App\EarningItem;
use App\OwnedItem;

class EarningSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:earning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Earning Seeder';

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

        // function
        function getId($data) {
            $collection = collect([]);
            foreach ($data as $d) {
                $collection->push($d->id);
            }
            return $collection->toArray();
        }

        $value = $this->ask('How many data for dammy?' , 5);

        // get data member id
        $dataMembers = Member::get();
        $membersId = collect([]);
        foreach ($dataMembers as $member) {
            if($member->user->level_user_id === 3) {
                $membersId->push($member->id);
            }
        }

        // get data items id
        $itemsId = getId(Item::get());
        // get data bank id
        $banksId = getId(Bank::get());


        // inserting with looping data student
        for ($iteration=1; $iteration <= $value; $iteration++) { 
            $memberId = $faker->randomElement($membersId);


            
            
            /**
              * Member Dashboard
            */
                
            // ---- cart --------
            $checkCart = Cart::where('member_id' , $memberId);
            if(!$checkCart->count()) {
                Cart::create(['member_id' , $memberId]);
            }
            // insert item into cart
            for ($j=1; $j < $faker->numberBetween($min = 2 , $max = 6); $j++) { 
                $myItems = $checkCart->first()->member->owned;
                $itemsOwn = collect([]);
                foreach ($myItems as $item) {
                    $itemsOwn->push($item->item_id);
                }
                $itemId = $faker->randomElement($itemsId);
                dump((!$itemsOwn->contains($itemId)));
                if(!$itemsOwn->contains($itemId)) {
                    dump('insert item => ' . $itemId);
                    CartItem::create([
                        'cart_id' => $checkCart->first()->id,
                        'item_id' => $itemId,
                    ]);
                }
            }


            // payment submit
            $proofPayment = [
                'bank_id'     => $faker->randomElement($banksId),
                'member_id'   => $memberId,
                'cart_id'     => $checkCart->first()->id,
                'total'       => $faker->numberBetween($min=3 , $max=15) .'00000',
                'bank'        => $faker->creditCardType,
                'customer'    => $faker->name,
                'card_number' => $faker->creditCardNumber,
                'proof_file'  => 'proof.jpg',
                'status'      => 'accept',
            ];
            dump($proofPayment);
            ProofPayment::create($proofPayment);



            
            
            /**
              * Admin Dashboard
            */
                
            $proof = ProofPayment::get()->last();
            $proofitems    = collect([]);
            $proofitemsId  = collect([]);
            $income = [
                'total'       => 0,
                'studioku'    => 0,
                'contributor' => 0,
            ];
            $incomeTotal = 0;

            foreach ($proof->cart->item as $item) {
                if(!$item->item->owned->where('member_id' , $proof->member_id)->count()) {
                    $item = $item->item;
                    $proofitems->push([
                        'id'             => $item->id,
                        'contributor_id' => $item->contributor_id,
                        'cost'           => $item->cost,
                    ]);
                    $proofitemsId->push($item->id);
                    OwnedItem::create([
                        'member_id' => $proof->member_id,
                        'item_id'   => $item->id,
                    ]);
                    $income['total']       += $item->cost;
                    $income['studioku']    += (30/100 * $item->cost);
                    $income['contributor'] += (70/100 * $item->cost);
                }
            }

            // insert into statistic earning
            $earningStatistic = EarningStatistic::where('date' , date('d'))
                                ->where('month' , date('m'))
                                ->where('year' , date('Y'));

            if(!$earningStatistic->get()->count()) {
                EarningStatistic::create([
                    'income'      => 0,
                    'studioku'    => 0,
                    'contributor' => 0,
                    'date'        => date('d'),
                    'month'       => date('m'),
                    'year'        => date('Y'),
                ]);
            }

            $earning = $earningStatistic->first();

            $earningStatistic->update([
                'income'      => (int)$earning->income + $income['total'],
                'studioku'    => (int)$earning->studioku + $income['studioku'],
                'contributor' => (int)$earning->contributor +  $income['contributor'],
            ]);

            $earningId = $earningStatistic->first()->id;
            foreach ($proofitemsId as $itemId) {
                EarningItem::create([
                    'statistic_id' => $earningId,
                    'item_id'      => $itemId,
                ]);
            }

            // insert into statistic contributor
            foreach($proofitems->groupBy('contributor_id') as $contributorId =>  $items) {
                $totalCost = 0;
                SaldoStatistic::create([
                    'contributor_id' => $contributorId,
                    'total'          => 0,
                    'date'           => date('d'),
                    'month'          => date('m'),
                    'year'           => date('Y'),
                ]);
                $saldoId = SaldoStatistic::where('contributor_id' , $contributorId)
                                ->where('date' , date('d'))
                                ->get()
                                ->last()
                                ->id;

                foreach($items as $item) {
                    $totalCost+= $item['cost'];
                    $soldItem = Item::find($item['id'])->sold;
                    SaldoItem::create([
                        'saldo_id' => $saldoId,
                        'item_id'  => $item['id'],
                        'cost'     => $item['cost'], 
                    ]);

                    Item::where('id' , $item['id'])->update(['sold' => $soldItem+1]);
                }

                SaldoStatistic::where('id' , $saldoId)->update(['total' => $totalCost]);
                $saldo = Contributor::where('id' , $contributorId)->first()->saldo;
                $saldo += $totalCost;
                Contributor::where('id' , $contributorId)->update(['saldo' => $saldo]);
            }



        }

    }
}
