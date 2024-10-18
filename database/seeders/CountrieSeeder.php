<?php

namespace Database\Seeders;

use App\Models\Countrie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
use App\Models\Countrie;

=======
>>>>>>> reset_password
class CountrieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Countrie::factory(15)->create();
    }
}
