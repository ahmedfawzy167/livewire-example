<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create(["title" => "Post 1", "description" => "Post Description 1"]);
        Post::create(["title" => "Post 2", "description" => "Post Description 2"]);
        Post::create(["title" => "Post 3", "description" => "Post Description 3"]);
        Post::create(["title" => "Post 4", "description" => "Post Description 4"]);
        Post::create(["title" => "Post 5", "description" => "Post Description 5"]);
        Post::create(["title" => "Post 6", "description" => "Post Description 6"]);
        Post::create(["title" => "Post 7", "description" => "Post Description 7"]);
        Post::create(["title" => "Post 8", "description" => "Post Description 8"]);
        Post::create(["title" => "Post 9", "description" => "Post Description 9"]);
        Post::create(["title" => "Post 10", "description" => "Post Description 10"]);
    }
}
