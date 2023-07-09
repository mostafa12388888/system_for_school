<?php

namespace Database\Seeders;

use App\Models\My_parnt;
use App\Models\National;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('my__parents')->delete();
            $my_parents = new My_parnt();
            $my_parents->Email = 'Mostafa.gamal77@yahoo.com';
            $my_parents->password = Hash::make('12345678');
            $my_parents->Name_father = ['en' => 'Mostafa Khaled', 'ar' => 'مصطفي خالد'];
            $my_parents->National_id_father = '1234567810';
            $my_parents->passpord_id_father = '1234567810';
            $my_parents->phone_father = '1234567810';
            $my_parents->job_father = ['en' => 'programmer', 'ar' => 'مبرمج'];
            $my_parents->National_id_father = National::all()->unique()->random()->id;
            $my_parents->Blood_id_father =Type_Blood::all()->unique()->random()->id;
            $my_parents->Religion_father_id = Religion::all()->unique()->random()->id;
            $my_parents->addres_father ='القاهرة';
            $my_parents->Name_mather = ['en' => 'SS', 'ar' => 'سس'];
            $my_parents->National_ID_Mother = '1234567810';
            $my_parents->passpord_id_mather = '1234567810';
            $my_parents->phone_mather = '1234567810';
            $my_parents->job_mather = ['en' => 'Teacher', 'ar' => 'معلمة'];
            $my_parents->National_id_mather = National::all()->unique()->random()->id;
            $my_parents->Blood_id_mather =Type_Blood::all()->unique()->random()->id;
            $my_parents->Religion_mather_id = Religion::all()->unique()->random()->id;
            $my_parents->addres_mather ='القاهرة';
            $my_parents->save();
    }
}
