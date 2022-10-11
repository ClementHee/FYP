<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\events;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class eventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'eventId' => Str::uuid(),
                'name' => 'Event Uno',
                'type' => 'Service',
                'date_time' => '10/10/10 10:00:00',
                'venue' => 'Hall A',
                'pic' => 'Irvin',
                
            ],
            
        ];
        foreach($events as $key => $value) {
            events::create($value);
        }
    }
}
