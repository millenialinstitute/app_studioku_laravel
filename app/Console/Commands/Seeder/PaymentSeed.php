<?php

namespace App\Console\Commands\Seeder;

use Illuminate\Console\Command;
use Faker\Factory as Faker;
use App\User;
use App\Contributor;
use App\Member;
use App\Cart;
use App\CartItem;
use App\ProofPayment;
use App\Item;
use App\Bank;
use App\OwnedItem;
use App\SaldoStatistic;
use App\SaldoItem;

class PaymentSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This for payment dummy';

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
        function showInfo($array , $title = 'Each Array') {
            echo "\n";
            dump($title);
            foreach ($array as $key => $value) {
                dump($key . ' => ' .  $value);
            }
            dump('----------------------------------------');
            echo "\n";
        }

        function getId($data) {
            $collection = collect([]);
            foreach ($data as $d) {
                $collection->push($d->id);
            }
            return $collection->toArray();
        }

        echo "\n\n";
        $this->info('Option will executed : ');
        $this->info('1. Generate Data for payment');
        $this->info('2. Confirm All Payment');
        $this->info('Choose your option to executed');
        $option = $this->ask('Option :');

        if($option === '1') {
            $faker = Faker::create('id_ID');


            // get data member id
            $dataContributor = Contributor::get();
            $contributorsId = collect([]);
            $mc = collect([]);
            foreach ($dataContributor as $data) {
                $mc->push($data->user->member->id);
            }
            $dataMember = Member::get();
            $membersId = collect([]);
            foreach ($dataMember as $data) {
                $membersId->push($data->id);
            }
            $membersIdList = collect([]);
            foreach ($membersId as $id) {
                if(!$mc->contains($id)) {
                    $membersIdList->push($id);
                }
            }
            $membersId = $membersIdList;

            // get data items id
            $itemsId = getId(Item::get());

            // get data bank id
            $banksId = getId(Bank::get());
            
            $this->info('+++++++++++++++++++++++++++++++++++ start  +++++++++++++++++++++++++++++++++++++++');

            $value = $this->ask('How many data for create?');

            for ($i=1; $i <= $value; $i++) { 
                $this->info('==================== data ke ' . $i . ' =========================');
                $memberId = $faker->randomElement($membersId);
                $user = Member::find($memberId)->user;

                $cart = [
                    'member_id' => $memberId,
                ];
                Cart::create($cart);
                $this->info('********** Payment By : ' . $user->name . ' *************');
                $cartId = Cart::get()->last()->id;

                for ($j=1; $j <= $faker->numberBetween($min= 3 , $max = 15); $j++) { 
                    $cartItem = [
                        'cart_id' => $cartId,
                        'item_id' => $faker->randomElement($itemsId),
                    ];
                    CartItem::create($cartItem);
                    showInfo($cartItem , '+++++++++ Item ' . $j .' +++++++++++');
                }

                $proof = [
                    'bank_id'     => $faker->randomElement($banksId),
                    'member_id'   => $memberId,
                    'cart_id'     => $cartId,
                    'total'       => $faker->numberBetween($min=3 , $max=15) .'00000',
                    'bank'        => $faker->creditCardType,
                    'customer'    => $faker->name,
                    'card_number' => $faker->creditCardNumber,
                    'proof_file'  => 'proof.jpg',
                    'status'      => 'accept',
                ];
                ProofPayment::create($proof);
                showInfo($proof , " ++++++++ Proof Array +++++++++ ");
            }
            echo "\n\n";

            $this->info('================================= complete ==================================');

        } else if($option === '2') {
            $paymentsId = getId(ProofPayment::where('status' , 'waiting')->get());
            foreach ($paymentsId as $paymentId) {
                ProofPayment::where('id' , $paymentId)->update(['status' => 'accept']);
                $proof = ProofPayment::find($paymentId);
                $items = $proof->cart->item;
                foreach ($proof->cart->item as $item) {
                    OwnedItem::create([
                        'member_id' => $proof->member_id,
                        'item_id'   => $item->item->id,
                    ]);
                }

                $cart = ProofPayment::where('id' , $paymentId)->first()->cart;
                $items = collect([]);
                foreach($cart->item as $item) {
                    $item = $item->item;
                    $items->push([
                        'id'             => $item->id,
                        'contributor_id' => $item->contributor_id,
                        'cost'           => $item->cost,
                    ]);
                }

                foreach($items->groupBy('contributor_id') as $contributorId =>  $items) {
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
}
