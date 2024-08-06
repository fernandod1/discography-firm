<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Artist;
use Illuminate\Validation\ValidationException;

class ArtistTest extends TestCase
{
    use RefreshDatabase;

    protected $artist;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artist = Artist::create(['name' => 'test', 'description' => 'test description']);
    }

    public function test_artist_model_exists_in_db(): void
    {
        $this->assertModelExists($this->artist);
    }
    
    public function test_index_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('artists.index'));
        $response
            ->assertStatus(200)
            ->assertSee('Artists listing')
            ->assertSee('test description');
    }

    public function test_store_new_artist(): void
    {
        $response = $this
            ->post(route('artists.store'),
            ['name' => 'test store', 'description' => 'test store description']);

        $artist = Artist::where('name', 'test store')->first();

        $this->assertNotNull($artist);
        $response->assertFound()->assertStatus(302);
        $this->assertEquals('test store', $artist->name);
    }

    public function test_create_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('artists.create'));
        $response
            ->assertStatus(200)
            ->assertSee('Add New Artist');           
    }

    public function test_show_page_returns_a_successful_response(): void
    {        
        $response = $this->get("/artists/{$this->artist->id}");
        $response
            ->assertStatus(200)
            ->assertSee($this->artist->name);   
    }

    public function test_update_an_artist(): void
    {
        $response = $this
            ->put("/artists/{$this->artist->id}",
            ['name' => 'test store updated', 'description' => 'test store description updated']);

        $artist = Artist::where('name', 'test store updated')->first();
        $this->assertNotNull($artist);
        $response->assertFound()->assertStatus(302);
        $this->assertEquals('test store updated', $artist->name);
    }

    public function test_delete_an_artist(): void
    {
        $response = $this
            ->delete("/artists/{$this->artist->id}");

        $artist = Artist::find($this->artist->id);
        $this->assertNull($artist);
        $response
            ->assertFound()
            ->assertStatus(302)
            ->assertSee('Redirecting');
    }

    public function test_edit_page_returns_a_successful_response(): void
    {
        $response = $this->get("/artists/{$this->artist->id}/edit");
        $response
            ->assertStatus(200)
            ->assertSee('Edit artist')
            ->assertSee($this->artist->name);
    }

    public function test_store_new_artist_with_missing_name_returns_error(): void
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $response = $this
        ->post(route('artists.store'),
        ['name' => null, 'description' => 'test store description with name missing']);

        $artist = Artist::where('description', 'test store description with name missing')->first();

        $this->assertNull($artist);
        $response->assertFound()->assertStatus(302);
    }

    public function test_store_new_artist_with_missing_description_returns_error(): void
    {
        $response = $this
        ->post(route('artists.store'),
        ['name' => 'test store with description missing', 'description' => null]);

        $artist = Artist::where('name', 'test store with description missing')->first();

        $this->assertNull($artist);
        $response->assertFound()->assertStatus(302);
    }

    public function test_search_artist_with_empty_artist_key_returns_error(): void
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $response = $this
        ->get(route('artists.search', ['artist' => null]));
    }
    
    public function test_search_artist_with_artist_key_with_less_than_3_chars_returns_error(): void
    {        
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $response = $this
        ->get(route('artists.search', ['artist' => 'AB']));
    }

    public function test_search_artist_page_returns_a_successful_response(): void
    {
        $response = $this
        ->get(route('artists.search', ['artist' => 'test']));

        $response
        ->assertStatus(200)
        ->assertSee('test');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->artist);
    }

}
