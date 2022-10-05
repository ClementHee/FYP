<?php

namespace Database\Seeders;

use App\Models\congregation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class congregationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $congregations = [
            [
            'name' => 'Bahasa Malaysia Congregation',
            'language' => "Bahasa Malaysia",
            'serviceTime' => "9:0:0",
            'location' => "This is a location for congregation 1",
            'pic' => "Mr Bob",
            ],
            [
            'name' => 'Chinese Congregation',
            'language' => "Chinese",                  
            'serviceTime' => "9:0:0",
            'location' => "This is a location for congregation 2",
            'pic' => "Mr Robert",
            ],
            [
            'name' => 'English Congregation',
            'language' => "English",
            'serviceTime' => "9:0:0",
            'location' => "This is a location for congregation 3",
            'pic' => "Mr Builder",
            ],
        ];
        foreach($congregations as $key => $value) {
            congregation::create($value);
        }
    }
}
