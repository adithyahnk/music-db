<?php

namespace Database\Seeders;

use App\Models\Song;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Song::truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('songs')->insert(array(
            0 =>
                array(
                    'name' => '9 to 5',
                    'release_date' => Carbon::now()->subDays(2)->subDays(20),
                    'cover' => 'alb1.jpeg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            1 =>
                array(
                    'name' => 'Footloose',
                    'release_date' => Carbon::now()->subYears(1)->subDays(12),
                    'cover' => 'alb2.jpeg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            2 =>
                array(
                    'name' => 'Tiny Dancer',
                    'release_date' => Carbon::now()->subWeeks(2)->subDays(1),
                    'cover' => 'alb3.jpeg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            3 =>
                array(
                    'name' => 'Hold On',
                    'release_date' => Carbon::now()->subMonths(1)->subDays(11),
                    'cover' => 'alb4.jpeg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            4 =>
                array(
                    'name' => 'Dont You',
                    'release_date' => Carbon::now()->subDays(2)->subDays(56),
                    'cover' => 'alb5.jpeg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            5 =>
                array(
                    'name' => 'Cant Fight the Moonlight',
                    'release_date' => Carbon::now()->subYears(1)->subDays(89),
                    'cover' => 'alb6.jpeg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            6 =>
                array(
                    'name' => 'Fame',
                    'release_date' => Carbon::now()->subYears(2)->subDays(200),
                    'cover' => 'alb7.jpeg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            7 =>
                array(
                    'name' => 'Summer Nights',
                    'release_date' => Carbon::now()->subYears(1)->subDays(2),
                    'cover' => 'alb8.jpeg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            8 =>
                array(
                    'name' => 'This is Me',
                    'release_date' => Carbon::now()->subYears(1)->subDays(),
                    'cover' => 'alb9.jpeg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            9 =>
                array(
                    'name' => 'Cry to Me',
                    'release_date' => Carbon::now()->subYears(2)->subDays(),
                    'cover' => 'alb10.jpeg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
        ));
    }
}
