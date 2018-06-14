<?php

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['customer_id'=>1,'amount'=>100,'destination'=>'other customer','service_id'=>3,'reference'=>'FX0001','message'=>'Sent'],
            ['customer_id'=>3,'amount'=>150,'destination'=>'mine','service_id'=>6,'reference'=>'FX0002','message'=>'Sent'],
            ['customer_id'=>2,'amount'=>300,'destination'=>'other customer','service_id'=>3,'reference'=>'FX0003','message'=>'Sent'],
            ['customer_id'=>1,'amount'=>50,'destination'=>'my phone','service_id'=>2,'reference'=>'FX0004','message'=>'Sent'],
            ['customer_id'=>2,'amount'=>200,'destination'=>'myself','service_id'=>4,'reference'=>'FX0005','message'=>'Successful'],
        ];
        foreach ($data as $datum)
        {
            Transaction::create($datum);
        }

    }
}
