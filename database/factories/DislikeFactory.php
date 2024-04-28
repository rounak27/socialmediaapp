<?php

namespace Database\Factories;

use App\Models\Picture;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dislike>
 */
class DislikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'UserID' => User::inRandomOrder()->first()->UserID, // Randomly assign a user ID
            'PictureID' => Picture::inRandomOrder()->first()->PictureID,
        ];
    }
}
