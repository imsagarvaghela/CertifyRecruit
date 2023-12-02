<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teams;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            ['name' => 'Aloha'],
            ['name' => 'Bloha'],
            ['name' => 'Cloha'],
        ];

        Teams::insert($teams);
    }
}
