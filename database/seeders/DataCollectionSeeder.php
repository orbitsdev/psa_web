<?php

namespace Database\Seeders;

use App\Models\DataCollection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataCollection::factory(3)->create();
    }
}
