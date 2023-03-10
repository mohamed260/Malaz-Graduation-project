<?php

namespace Database\Seeders;

use App\Models\Counter;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Condition::factory(20)->create([
            'counter_id' => function ()
            {
                return Counter::factory()->create()->id;
            }
        ]);
    }
}
