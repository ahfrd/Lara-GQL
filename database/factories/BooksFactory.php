<?php

namespace Database\Factories;

use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

class BooksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Books::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => rand(1,10),
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'year' => rand(2015,2021), // password
            'genre' =>  $this->faker->text($maxNbChars = 20),
        ];
    }
}
