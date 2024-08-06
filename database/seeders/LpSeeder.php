<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lp;

class LpSeeder extends Seeder
{
	const DATA = array(
		[   
            'artist_id' => 1,
            'name' => 'Reload',
            'description' => 'Reload. Released: November 18, 1997.'
        ],
		[
            'artist_id' => 2,
            'name' => 'Abbey Road',
            'description' => 'Abbey Road. Released: 26 September 1969.'
        ],
		[
            'artist_id' => 3,
            'name' => 'The Joshua Tree',
            'description' => 'The Joshua Tree. Released: 9 March 1987.'
        ],
		[
            'artist_id' => 4,
            'name' => 'In Through the Out Door',
            'description' => 'In Through the Out Door. Released: 22 August 1979.'
        ],
		[
            'artist_id' => 5,
            'name' => 'Bridges to Babylon',
            'description' => 'Bridges to Babylon. Released: 29 September 1997.'
        ]
	);

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		for ($i = 0; $i < sizeof(self::DATA); $i++) { 
			Lp::firstOrCreate(self::DATA[$i]);
		}
    }
}
