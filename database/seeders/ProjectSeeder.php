<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 100; $i++) { 
            Project::create([
                'judul' => fake() -> sentence(3),
                'responsibility' => fake() -> sentence(1),
                'tgl_project' => fake() -> date()
            ]);
        }
    }
}
