<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        // Use a reliable placeholder image service
        $imageUrl = 'https://picsum.photos/640/480';
        $imageName = 'post_images/' . uniqid() . '.jpg'; // Unique name for the image
        $imageContents = file_get_contents($imageUrl);

        // Store the image in the public disk
        Storage::disk('public')->put($imageName, $imageContents);

        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'posted_by' => User::factory(),
            'image' => $imageName, // Store the path to the image
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}