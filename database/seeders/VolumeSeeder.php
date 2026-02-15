<?php

namespace Database\Seeders;

use App\Models\Volume;
use Illuminate\Database\Seeder;

class VolumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Volume::query()->create([
            'name' => 'Vol 2',
            'date' => '2027',
            'isCurrent' => true,
        ]);
    }
}
