<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BlogPost;
use App\Models\PostImage;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();
//        BlogPost::factory(20)->create();

        PostImage::factory()->count(20)->create();

        User::find(1)->update([
            'name' => 'Zack',
            'email' => 'zakkturner1993@gmail.com',
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
