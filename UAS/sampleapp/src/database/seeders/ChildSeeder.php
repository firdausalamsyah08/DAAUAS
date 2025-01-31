<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Child;

class ChildSeeder extends Seeder
{
    public function run()
    {
        Child::create([
            'name' => 'John Doe',
            'birthdate' => '2020-01-01',
            'gender' => 'Male',
        ]);

        Child::create([
            'name' => 'Jane Doe',
            'birthdate' => '2019-05-10',
            'gender' => 'Female',
        ]);
    }
}
