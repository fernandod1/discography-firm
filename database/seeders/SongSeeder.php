<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{
	const DATA = array(
        [
            'lp_id' => 1,
            'name' => 'Fuel'
        ],
        [
            'lp_id' => 1,
            'name' => 'The Memory Remains'
        ],
        [
            'lp_id' => 1,
            'name' => 'Devil\'s Dance'
        ],
        [
            'lp_id' => 2,
            'name' => 'Come Together'
        ],
        [
            'lp_id' => 2,
            'name' => 'Something'
        ],
		[
            'lp_id' => 2,
            'name' => 'Maxwell\'s Silver Hammer'
        ],
		[
            'lp_id' => 3,
            'name' => 'Where the Streets Have No Name'
        ],
        [
            'lp_id' => 3,
            'name' => 'I Still Haven\'t Found What I\' Looking For'
        ],
        [
            'lp_id' => 3,
            'name' => 'With or Without You'
        ],
		[
            'lp_id' => 4,
            'name' => 'In the Evening'
        ],
        [
            'lp_id' => 4,
            'name' => 'South Bound Saurez'
        ],
        [
            'lp_id' => 4,
            'name' => 'Fool in the Rain'
        ],
		[
            'lp_id' => 5,
            'name' => 'Flip the Switch'
        ],
        [
            'lp_id' => 5,
            'name' => 'Anybody Seen My Baby?'
        ],
        [
            'lp_id' => 5,
            'name' => 'Low Down'
        ]
	);

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		for ($i = 0; $i < sizeof(self::DATA); $i++) { 
			Song::firstOrCreate(self::DATA[$i]);
		}
    }
}
