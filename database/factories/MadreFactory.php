<?php

namespace Database\Factories;

use App\Models\Madre;
use Illuminate\Database\Eloquent\Factories\Factory;

class MadreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Madre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'paterno'=> strtoupper($this->faker->lastName),
            'materno'=> strtoupper( $this->faker->lastName),
            'nombres'=> strtoupper( $this->faker->firstNameFemale ),
            'ci'=> $this->faker->unique()->numberBetween(10000,12000),
            'fechanac'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'sexo'=>'F',
            'salario'=>'NO',
            'afp'=>'NO',
            'rentista'=>'NO',
            'juana'=>'NO',
            'discapacidad'=>'NO',
            'created_at'=>now()
        ];
    }
}
