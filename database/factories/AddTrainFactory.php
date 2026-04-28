<?php

namespace Database\Factories;

use App\Models\AddTrain;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AddTrain>
 */
class AddTrainFactory extends Factory
{
    protected $model = AddTrain::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'train_name' => fake()->randomElement([
                'Shatabdi Express',
                'Rajdhani Express',
                'Duronto Express',
                'Garib Rath',
                'Intercity Express'
            ]),
            'train_number' => fake()->unique()->numerify('TRN####'),
            'origin' => fake()->randomElement(['Delhi', 'Mumbai', 'Kolkata', 'Chennai', 'Lucknow']),
            'destination' => fake()->randomElement(['Jaipur', 'Pune', 'Bhopal', 'Patna', 'Kanpur']),
            'departure_time' => fake()->time('H:i:s'),
            'arrival_time' => fake()->time('H:i:s'),
            'price' => fake()->numberBetween(100, 2000),
            'classes' => [
                'first_class' => fake()->numberBetween(2500, 5000),
                'sleeper' => fake()->numberBetween(800, 1800),
                'economy' => fake()->numberBetween(300, 900),
            ],
        ];
    }
}
