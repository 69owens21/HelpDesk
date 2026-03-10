<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\tickets;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */

        public function run(): void
    {
        // 1. Create your specific users first (so the factory has users to pick from)
        User::factory()->create(['name' => 'Gracie', 'role' => 'admin']);
        User::factory(5)->create(['role' => 'student']); // Makes 5 random students

        // 2. MASS PRODUCE 10 TICKETS
        \App\Models\tickets::factory(10)->create();
    }

}
