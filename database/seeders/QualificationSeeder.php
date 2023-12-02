<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Qualification;


class QualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $qualifications = [
            ['name' => 'SSC'],
            ['name' => 'HSC'],
            ['name' => 'Diploma'],
            ['name' => 'Graduation'],
            ['name' => 'Master'],
            ['name' => 'PHD'],
        ];

        Qualification::insert($qualifications);        
    }
}
