<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Person;

class PersonFactory extends Factory
{
    protected $model = Person::class;

    
      public function definition()
    {

        return [
            'name' => $this->faker->word,
            'hire_date' => $this->faker->date
        ];
    }
}
