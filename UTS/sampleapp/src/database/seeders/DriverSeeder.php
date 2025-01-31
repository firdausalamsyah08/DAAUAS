<?php

// database/seeders/DriverSeeder.php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan data driver contoh
        Driver::create([
            'name' => 'Eko',
            'vehicle_number' => 'B1234XYZ',
            'vehicle_type' => 'Bus',
        ]);

        Driver::create([
            'name' => 'Jono',
            'vehicle_number' => 'B5678ABC',
            'vehicle_type' => 'Truk',
        ]);

        Driver::create([
            'name' => 'Budi',
            'vehicle_number' => 'B9101DEF',
            'vehicle_type' => 'Sedan',
        ]);
    }
}
