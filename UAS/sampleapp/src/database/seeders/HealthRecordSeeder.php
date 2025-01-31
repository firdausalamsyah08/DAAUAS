<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HealthRecord;

class HealthRecordSeeder extends Seeder
{
    public function run()
    {
        HealthRecord::create([
            'child_id' => 1,
            'height' => 85,
            'weight' => 12,
            'vaccination_status' => 'Complete',
            'notes' => 'Healthy and active',
        ]);
    }
}

