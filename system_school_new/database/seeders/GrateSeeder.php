<?php

namespace Database\Seeders;

use App\Models\Grate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

// DB::table('grates')->delete();
// $grate=[
//     ['en'=>'primery school','ar'=>'المدرسه الابتدائيه'],
//     ['en'=>'secondery school','ar'=>'المدرسه الثانويه'],
//     ['en'=>'primery school','ar'=>'المدرسه الاعداديه'],
// ];
$grades = [
    ['en'=> 'Primary stage', 'ar'=> 'المرحلة الابتدائية'],
    ['en'=> 'middle School', 'ar'=> 'المرحلة الاعدادية'],
    ['en'=> 'High school', 'ar'=> 'المرحلة الثانوية'],
];

foreach ($grades as $grade) {
   
    Grate::create([
        'Name'=>$grade,
    ]);
   }
    }
}
