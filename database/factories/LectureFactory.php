<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LectureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->safeEmail,
            'password'=>$this->faker->password(8),
            'type'=>$this->faker->randomElement(array_keys(config('cm.presentationType'))),
            'subject'=>$this->faker->numberBetween(0,16),
            'title'=>$this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'author_info'=>json_encode($this->faker->words($nb = 3, $asText = false)),
            'abstract'=>$this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'keywords'=>$this->faker->words($nb = 3, $asText = true),
            'abstract_file'=>'abstract/'.Str::random(20),
            'co_authors'=>json_encode($this->faker->words($nb = 3, $asText = false)),
            'country'=>$this->faker->country
        ];
    }
}
