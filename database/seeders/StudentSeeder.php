<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => 'John Christian Narbaja',
            'course' => 'BSCS',
            'email' => 'narbajajcs@gmail.com',
            'phone' => '091233773',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('students')->insert([
            'name' => 'Ricardo Reducto',
            'course' => 'BSCS',
            'email' => 'narbajajcs@gmail.com',
            'phone' => '091233773',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('students')->insert([
            'name' => 'Jhobert Panerio',
            'course' => 'BSCS',
            'email' => 'narbajajcs@gmail.com',
            'phone' => '091233773',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
