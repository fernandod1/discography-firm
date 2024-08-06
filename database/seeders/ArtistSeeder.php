<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
	const DATA = array(
		[
			'name' => 'Metallica',
	    	'description' => 'Metallica is an American heavy metal band. The band was formed in 1981 in Los Angeles by vocalist and guitarist James Hetfield and drummer Lars Ulrich.'
		],
		[
			'name' => 'The Beatles',
	        'description' => 'The Beatles were an English rock band formed in Liverpool in 1960, comprising John Lennon, Paul McCartney, George Harrison and Ringo Starr.'
		],
		[
			'name' => 'U2',
	        'description' => 'U2 are an Irish rock band formed in Dublin in 1976. The group consists of Bono (lead vocals and rhythm guitar), the Edge (lead guitar, keyboards, and backing vocals), Adam Clayton (bass guitar), and Larry Mullen Jr.'
		],
		[
			'name' => 'Led Zeppelin',
			'description' => 'Led Zeppelin were an English rock band formed in London in 1968. The band comprised Robert Plant (vocals), Jimmy Page (guitar), John Paul Jones (bass and keyboards) and John Bonham (drums).'
		],
		[
			'name' => 'The Rolling Stones',
	        'description' => 'The Rolling Stones are an English rock band formed in London in 1962. Active across seven decades, they are one of the most popular and enduring bands of the rock era.'
		]
	);

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		for ($i = 0; $i < sizeof(self::DATA); $i++) { 
			Artist::firstOrCreate(self::DATA[$i]);
		}
    }


}
