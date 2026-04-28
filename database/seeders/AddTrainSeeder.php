<?php

namespace Database\Seeders;

use App\Models\AddTrain;
use Illuminate\Database\Seeder;

class AddTrainSeeder extends Seeder
{
    public function run(): void
    {
        AddTrain::factory()->count(20)->create();
    }
}
