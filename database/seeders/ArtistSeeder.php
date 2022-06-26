<?php

namespace Database\Seeders;

use App\Models\Artist;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Artist::truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('artists')->insert(array(
            0 =>
                array(
                    'name' => 'Justin Beiber',
                    'dob' => Carbon::now()->subYears(23)->subDays(7),
                    'bio' => 'Justin Drew Bieber is a Canadian singer. Bieber is widely recognised
                    for his genre-melding musicianship and has played an influential role in
                     modern-day popular music.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            1 =>
                array(
                    'name' => 'Taylor Swift',
                    'dob' => Carbon::now()->subYears(34)->subDays(9),
                    'bio' => 'Taylor Alison Swift is an American singer-songwriter. Her discography spans
                     multiple genres, and her narrative songwriting—often inspired by her personal life—has
                     received critical praise and widespread media coverage.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),

            2 =>
                array(
                    'name' => 'Lady Gaga',
                    'dob' => Carbon::now()->subYears(22)->subDays(22),
                    'bio' => 'Stefani Joanne Angelina Germanotta, known professionally as Lady Gaga, is an
                     American singer, songwriter, and actress. She is known for her image reinventions and musical versatility',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            3 =>
                array(
                    'name' => 'Drake',
                    'dob' => Carbon::now()->subYears(27)->subDays(145),
                    'bio' => 'Aubrey Drake Graham is a Canadian rapper, singer, and actor. An influential figure
                     in modern popular music, Drake has been credited for popularizing singing and R&B
                      sensibilities in hip hop.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            4 =>
                array(
                    'name' => 'Chris Brown',
                    'dob' => Carbon::now()->subYears(35)->subDays(320),
                    'bio' => 'Christopher Maurice Brown is an American singer, songwriter, dancer, graffiti artist
                     and actor. According to Billboard, Brown is one of the most influential and successful R&B singers eve',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            5 =>
                array(
                    'name' => 'Jennifer Lopez',
                    'dob' => Carbon::now()->subYears(41)->subDays(232),
                    'bio' => 'Jennifer Lynn Lopez, also known as J.Lo, is an American singer, actress, and dancer. In 1991,
                    she began appearing as a Fly Girl dancer on In Living Color, where she remained a regular
                     until she decided to pursue an acting career in 1993',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            6 =>
                array(
                    'name' => 'Rihanna',
                    'dob' => Carbon::now()->subYears(31)->subDays(99),
                    'bio' => 'Robyn Rihanna Fenty NH is a Barbadian singer, actress, fashion designer, and businesswoman.
                     Born in Saint Michael and raised in Bridgetown, Barbados, Rihanna was discovered by American record
                      producer Evan Rogers who invited her to the United States to record demo tapes.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            7 =>
                array(
                    'name' => 'Harry Styles',
                    'dob' => Carbon::now()->subYears(33)->subDays(43),
                    'bio' => 'Harry Edward Styles is an English singer, songwriter and actor. His musical career began
                     in 2010 as a solo contestant on the British music competition series The X Factor.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            8 =>
                array(
                    'name' => 'Adam Levine',
                    'dob' => Carbon::now()->subYears(21)->subDays(73),
                    'bio' => 'Adam Noah Levine is an American singer, songwriter and musician, who is the lead
                     vocalist and rhythm guitarist of the pop rock band Maroon 5.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
            9 =>
                array(
                    'name' => 'Ed Sheeran',
                    'dob' => Carbon::now()->subYears(25)->subDays(100),
                    'bio' => 'Edward Christopher Sheeran MBE is an English singer-songwriter. Born in Halifax,
                     West Yorkshire and raised in Framlingham, Suffolk, he began writing songs around
                     the age of eleven.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ),
        ));
    }
}
