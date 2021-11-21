<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'room_number' => '1',
            'details' => 'details',
            'price' => '200',
            'type' => 'single',
            'branch_id' => '1',
            
        ]); 
        Room::create([
            'room_number' => '2',
            'details' => 'details',
            'price' => '200',
            'type' => 'double',
            'branch_id' => '1',
            
        ]);
        Room::create([
            'room_number' => '3',
            'details' => 'details',
            'price' => '200',
            'type' => 'suite',
            'branch_id' => '1',
            
        ]);

        Room::create([
            'room_number' => '1',
            'details' => 'details',
            'price' => '200',
            'type' => 'single',
            'branch_id' => '2',
            
        ]);
        Room::create([
            'room_number' => '2',
            'details' => 'details',
            'price' => '200',
            'type' => 'double',
            'branch_id' => '2',
            
        ]);
        Room::create([
            'room_number' => '3',
            'details' => 'details',
            'price' => '200',
            'type' => 'suite',
            'branch_id' => '2',
            
        ]);
       
    }
}
