<?php

namespace Database\Seeders;

use App\Models\Classrom;
use App\Models\Grate;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('sections')->delete();
       $Section=[
        ['en'=>'A','ar'=>'أ'],
        ['en'=>'B','ar'=>'ب'],
        ['en'=>'C','ar'=>'ت'],
        ['en'=>'D','ar'=>'ث'],
       ];
       foreach($Section as $data){
       Section::create([
            'section_name'=>$data,
            'status'=>1,
            'Grate_id'=>Grate::all()->unique()->random()->id,
            'class_id'=>Classrom::all()->unique()->random()->id,
        ]);
       }
    }
}
