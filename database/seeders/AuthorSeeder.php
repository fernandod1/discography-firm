<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
	const DATA = array(
		['name' => 'James Hetfield'],
		['name' => 'Kirk Hammett'],
		['name' => 'Lars Ulrich'],
		['name' => 'Paul McCartney'],
		['name' => 'John Lennon'],
		['name' => 'George Harrison'],
		['name' => 'Paul Hewson'],
		['name' => 'Adam Clayton'],
		['name' => 'Larry Mullen'],
		['name' => 'Jimmy Page'],
		['name' => 'Robert Plant'],
		['name' => 'John Bonham'],
		['name' => 'Mick Jagger'],
		['name' => 'Keith Richards'],
		['name' => 'Ronnie Wood']
	);

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		for ($i = 0; $i < sizeof(self::DATA); $i++) { 
			Author::firstOrCreate(self::DATA[$i]);
		}
    }


}
