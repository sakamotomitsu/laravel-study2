<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('people') -> insert([
//            'name' => Str::random(10),
//            'mail' => Str::random(10).'@test.com',
//            'age' => rand(20, 50)
//        ]);

        DB::table('people') -> insert([
            'name' => 'sakamoto',
            'mail' => 'sakamto@test.com',
            'age' => '30'
        ]);

        DB::table('people') -> insert([
            'name' => 'suzuki',
            'mail' => 'suzuki@test.com',
            'age' => '50'
        ]);
    }
}
