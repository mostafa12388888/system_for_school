<?php

namespace Database\Seeders;


use App\Models\Grate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Classrom;
class ClassRomTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classroms')->delete();
        $grade1=[['en'=>'primery grade','ar'=>'لصف الاول'],
        ['en'=>'first grade','ar'=>'الصف الثاني'],
        ['en'=>'sechondery grade','ar'=>'الف الثاني'],
        ['en'=>'third school','ar'=>'الصف الثالث']];
    foreach( $grade1 as $data){
        Classrom::create(
          ['Name_Class'=>$data,
        'Grate_id'=>Grate::all()->unique()->random()->id]);
    }
    }
}
