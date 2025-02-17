<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Room;
use App\Models\House;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(8) -> create();
        Room::factory(6) -> create();

        for($i = 0; $i < 10; $i++){
            House::factory() -> create([
                'tenant_id' => $i < 3 ? null : $users -> random(),
                'owner_id' => $users -> random()
            ]);
        }
    }
}
