<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('religions')->delete();
        $R=[
            ['ar'=>'مسلم','en'=>'nuslim'],
            ['ar'=>'مسيحي','en'=>'christian'],
            ['ar'=>'غير ذالك','en'=>'other'],
        ];
        foreach($R as $r) {
        Religion::create(['Name'=>$r]);}
    }
}
