<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\member_profile;
use Illuminate\Database\Seeder;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class member_profileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member_profiles = [
            [
                'profileId' => Str::uuid(),
                'name' => 'John Doe',
                'phone' => "0123456789",
                'handphoneNo' => "012384357",
                'email' => "johndoe@email.com",
                'address' => "This is an address text, can't think of one now",
                'congregation' => "congregation 1",
                'gender' => "male",
                'designation' => 'Mr',
            ],
            [
                'profileId' => Str::uuid(),
                'name' => 'John x',
                'phone' => "012356789",
                'handphoneNo' => "01284357",
                'email' => "johndoe@eail.com",
                'address' => "This is address text, can't think of one now",
                'congregation' => "congregation 2",
                'gender' => "male",
                'designation' => 'Mr',
            ]
        ];
        foreach($member_profiles as $key => $value) {
            member_profile::create($value);
        }
    }
}
