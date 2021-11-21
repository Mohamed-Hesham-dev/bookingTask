<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'name'=>'branch1',
            'hotel_id'=>1
        ]);

        Branch::create([
            'name'=>'branch2',
            'hotel_id'=>1
        ]);
    }
}
