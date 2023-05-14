<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
            ['name' => Str::random(10)],
        ];
        DB::table('departments')->insert($data);
    }
}
