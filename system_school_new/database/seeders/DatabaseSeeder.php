<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
         
        $this->call(user::class);
        $this->call(GrateSeeder::class);
        $this->call(ClassRomTable::class);
        $this->call(sectionSeeder::class);
        $this->call(NationalTableSeeder::class);
        $this->call(ReligonTableSeeder::class);
        $this->call(BloodTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(ParentSeeder::class);
        $this->call(studentTableSeeder::class);
        $this->call(SeetinsTableSeeder::class);
    }
}
