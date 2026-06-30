<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Project::create([
            'name' => 'Aquila',
            'location' => 'Ubud, Bali',
            'documentation' => 'https://drive.google.com/drive/folders/1asQdAoEofJJl-xn98W8bOqY4jtrbdVEb',
            'owner' => 'Andree Susilo',
            'architect' => 'Architect Studio',
            'longitude' => "8°30'23.2\"S",
            'latitude' => "115°16'15.0\"E",
            'youtube' => 'https://youtube.com/shorts/tcT-aCB4D-g?si=rxahy92BUn_pJBI0',
            'sm' => 'Pak Ketut',
            'supervisor' => 'Pak Made',
            'drafter' => 'Karel',
            'progress_project' => 'https://drive.google.com/drive/folders/1asQdAoEofJJl-xn98W8bOqY4jtrbdVEb',
            'password' => 'password',
        ]);
    }
}
