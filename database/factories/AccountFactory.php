<?php

namespace Database\Factories;
use App\Models\account;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = account::class;

    public function definition(): array
    {
        $faker = Faker::create('vi_VN');
        $sex = ['Nam', 'Nữ'];

        return [
            'avatar'=> 'avatar-'.random_int(1, 6).'.jpg',
            'firstname'=>$faker->firstName(),
            'fullname'=>$faker->fullName(),
            'sex'=> $sex[array_rand($sex)],
            'phone'=> fake(12)->phoneNumber(),
            'address'=>$faker->address(),
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
            'email'=>fake()->email(),
            'password'=>fake()->password(),
            'status'=>'ON',
            'function' => 1
        ];
    }
}
