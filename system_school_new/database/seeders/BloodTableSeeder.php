<?php

namespace Database\Seeders;

use App\Models\Type_Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type__bloods')->delete();
        $B=['o-','o+','A+','A-','B+','B-','AB-','AB+'];
        foreach($B as $b)
        Type_Blood::create(['Name'=>$b]);
    }
}
