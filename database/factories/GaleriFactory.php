<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GaleriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $randomnum= rand(1,100);
        $cover= "https://picsum.photos/id/{$randomnum}/200/300";

        return [

           'kategori' => $this->faker->randomElement($array=array('Praker,raker')),
           'foto' => $cover,
        ];
    }
}
