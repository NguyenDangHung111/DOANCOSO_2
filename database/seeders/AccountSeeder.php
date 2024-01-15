<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\account;
use Faker\Factory as Faker;
class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $records = account::all();
        // $faker = Faker::create('vi_VN');
        // foreach ($records as $record) {
        //     $record->update([
        //         'fullname' => $faker->firstName . ' ' . $faker->lastName,
        //     ]);
        // }

        // account::factory()->count(1000)->create();  

    }
}
