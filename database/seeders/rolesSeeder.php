<?php

namespace Database\Seeders;

use App\Models\roles;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'roleId' => 1,
                'name' => 'Preacher'
            ],
            [
                'roleId' => 2,
                'name' => 'Service Leader'
            ],
            [
                'roleId' => 3,
                'name' => 'Worship Leader'
            ],
            [
                'roleId' => 4,
                'name' => 'Backup Vocalist'
            ],
            [
                'roleId' => 5,
                'name' => 'Guitar'
            ],
            [
                'roleId' => 6,
                'name' => 'Piano'
            ],
            [
                'roleId' => 7,
                'name' => 'Bass'
            ],
            [
                'roleId' => 8,
                'name' => 'Drums'
            ],
            [
                'roleId' => 9,
                'name' => 'Sunday School Teacher'
            ],
            [
                'roleId' => 10,
                'name' => 'Usher'
            ],
            [
                'roleId' => 11,
                'name' => 'Member'
            ],
           
           
        ];
        foreach($roles as $key => $value) {
            roles::create($value);
        }
    }
}

