<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    
    {

        return [
            'Nim' => $this->faker->phoneNumber(),    
            'Nama' => $this->faker->name(),
            'Alamat' => $this->faker->address(),
            'Prodi' => $this->faker->country()    
        ];
    }
    
}
