<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AuthorSong;

class AuthorSongSeeder extends Seeder
{
	const DATA = array(
        ['author_id' => 1, 'song_id' => 1],
        ['author_id' => 2, 'song_id' => 2],
        ['author_id' => 3, 'song_id' => 2],
        ['author_id' => 1, 'song_id' => 3],
        ['author_id' => 5, 'song_id' => 4],
        ['author_id' => 4, 'song_id' => 4],
        ['author_id' => 6, 'song_id' => 5],
        ['author_id' => 4, 'song_id' => 6],
        ['author_id' => 5, 'song_id' => 6],
        ['author_id' => 7, 'song_id' => 7],
        ['author_id' => 9, 'song_id' => 7],
        ['author_id' => 7, 'song_id' => 8],
        ['author_id' => 8, 'song_id' => 9],
        ['author_id' => 10, 'song_id' => 10],
        ['author_id' => 11, 'song_id' => 11],
        ['author_id' => 12, 'song_id' => 12],
        ['author_id' => 10, 'song_id' => 12],
        ['author_id' => 13, 'song_id' => 13],
        ['author_id' => 14, 'song_id' => 14],
        ['author_id' => 15, 'song_id' => 14],
        ['author_id' => 13, 'song_id' => 15],
	);

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		for ($i = 0; $i < sizeof(self::DATA); $i++) { 
			AuthorSong::firstOrCreate(self::DATA[$i]);
		}
    }
}
