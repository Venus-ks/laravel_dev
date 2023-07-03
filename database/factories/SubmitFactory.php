<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
class SubmitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'price'=>$this->faker->randomElement([10000,20000]),
            'sosok'=>$this->faker->company,
            'job'=>$this->faker->jobTitle,
            // 'level'=>$this->faker->randomDigit(),
            'email'=>$this->faker->email,
            'cellphone'=>$this->faker->cellPhoneNumber,
            'status'=>$this->faker->randomElement(['접수증','완료']),
            // 'eng_name'=>Faker::create('en_US')->name,
            // 'zip'=>$this->faker->postcode,
            // 'addr1'=>$this->faker->address,
            // 'addr2'=>$this->faker->buildingNumber,
            'created_at'=>$this->faker->dateTimeBetween('-7 day'),
            'updated_at'=>$this->faker->dateTimeBetween('-3 day')
        ];
    }
}
