<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sector;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(20)->create([
            'sector_id' => function ()
            {
                return Sector::factory()->create()->id;
            }
        ]);

       

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@admin.com',
            'phone' => '123456789',
            'role' => 'admin',
            'sector_id' => function ()
            {
                return Sector::factory()->create()->id;
            }
            
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@user.com',
            'phone' => '123456789',
            'role' => 'user',
            'sector_id' => function ()
            {
                return Sector::factory()->create()->id;
            }
            
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@employee.com',
            'phone' => '123456789',
            'role' => 'employee',
            'sector_id' => function ()
            {
                return Sector::factory()->create()->id;
            }
        ]);

            $this->call([
                CounterSeeder::class,
                ConditionSeeder::class,
                CaseDetailsSeeder::class,
            ]);
            
    }
}
