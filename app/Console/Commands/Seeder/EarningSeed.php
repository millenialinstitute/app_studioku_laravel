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

        // function
        function getId($data) {
            $collection = collect([]);
            foreach ($data as $d) {
                $collection->push($d->id);
            }
            return $collection->toArray();
        }

        function Execute($day , $month , $year , $value) {
                /* ======================================================= Execute =================================================================== */
                    $faker = Faker::create('id_ID');


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


                        
                        
                        // ------------------------------------------------- Member -------------------------------------------------- 
                            
                        // ---- cart --------
                        $checkCart = Cart::where('member_id' , $memberId);
                        if(!$checkCart->count()) {
                            Cart::create(['member_id' => $memberId]);
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



                        
                        
                        // ------------------------------------------------- Admin --------------------------------------------------
                            
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
                        $earningStatistic = EarningStatistic::where('date' , $day)
                                            ->where('month' , $month)
                                            ->where('year' , $year);

                        if(!$earningStatistic->get()->count()) {
                            EarningStatistic::create([
                                'income'      => 0,
                                'studioku'    => 0,
                                'contributor' => 0,
                                'date'        => $day,
                                'month'       => $month,
                                'year'        => $year,
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
                                'date'           => $day,
                                'month'          => $month,
                                'year'           => $year,
                            ]);
                            $saldoId = SaldoStatistic::where('contributor_id' , $contributorId)
                                            ->where('date' , $day)
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


                    /* =================================================== Execute Complete ======================================================================= */
        }

        

        function getDate($array) {
            $newArray = explode('-' , $array);
            return $data = [
                'day'   => (int)$newArray[0],
                'month' => (int)$newArray[1],
                'year'  => (int)$newArray[2],
            ];
        }
        $fromDate = getDate($this->ask('From date : '));
        $toDate = getDate($this->ask('To date :'));
        $value = $this->ask('How many data for dammy?' , 5);


        if($fromDate['year'] === $toDate['year']) {
            if($fromDate['month'] === $toDate['month']) {
                for ($date=$fromDate['day']; $date <= $toDate['day']; $date++) { 
                    Execute($date , $toDate['month'] , $toDate['year'] , $value);
                }
            } else {
                for ($month=$fromDate['month']; $month <= $toDate['month']; $month++) { 
                    if($toDate['month'] === $month) {
                        $lastDate = date($toDate['year'] . '-' . $month . '-' . $toDate['day']);
                        $lastDay = $toDate['day'];
                        for ($date=1; $date <= $lastDay; $date++) { 
                            $day   = $date;
                            $month = $month;
                            $year  = $toDate['year'];
                            Execute($date , $month , $year , $value);
                        }
                    } else {
                        $lastDate = date('Y-m-t' , strtotime(date($toDate['year'] . '-' . $month . '-d')));
                        $lastDay = (int)substr($lastDate, -2);
                        if($fromDate['month'] === $month) {
                            for ($date=$fromDate['day']; $date <= $lastDay; $date++) { 
                                $day   = $date;
                                $month = $month;
                                $year  = $toDate['year'];
                                Execute($date , $month , $year , $value);
                            }
                        } else {
                            for ($date=1; $date <= $lastDay; $date++) { 
                                $day   = $date;
                                $month = $month;
                                $year  = $toDate['year'];
                                Execute($date , $month , $year , $value);
                            }
                        }
                    }
                }
            }
        } else {
            dd('false');
        }


        

    }
}
