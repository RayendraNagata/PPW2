<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        for ($i=0; $i < 100; $i++) { 
            Buku::create([
                'judul' => fake()-> sentence(3),
                'penulis' => fake()-> name(),
                'harga' => fake()->numberBetween(1000000, 5000000),
                'tgl_terbit' => fake()->date()
            ]);
        }
    }
}
