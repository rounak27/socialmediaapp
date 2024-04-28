<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Picture>
 */
class PictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIds = User::pluck('UserID')->toArray();

        return [
            //
            
            'Title' => $this->faker->sentence,
            'Description' => $this->faker->paragraph,
            'FilePath' => $this->faker->imageUrl(),
            'UserID' => $this->faker->randomElement($userIds)
        ];
    }
}
