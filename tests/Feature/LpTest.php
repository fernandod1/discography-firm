<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Artist;
use App\Models\Author;
use App\Models\Lp;
use Illuminate\Validation\ValidationException;

class LpTest extends TestCase
{
    use RefreshDatabase;

    protected $lp;

    protected function setUp(): void
    {
        parent::setUp();
        $this->lp = Lp::create([
            'artist_id' => Artist::create(['name' => 'test artist name', 'description' => 'test artist description'])->id, 
            'name' => 'test lp name',
            'description' => 'test lp description'
        ]);
    }

    public function test_lp_model_exists_in_db(): void
    {
        $this->assertModelExists($this->lp);
    }

    public function test_index_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('lps.index'));
        $response
            ->assertStatus(200)
            ->assertSee('LPs listing')
            ->assertSee('test lp description');
    }

    public function test_store_new_lp(): void
    {
        $response = $this
            ->post(route('lps.store'),
            [
                    'artist_id' => strval(Artist::create(['name' => 'test store', 'description' => 'test store description'])->id), 
                    'name' => 'test store',
                    'description' => 'test store description',
                    "songsAuthors" => [
                        0 => [
                            "song" => "song1",
                            "authors" => [
                                0 => Author::create(['name' => 'test author'])->id
                            ],
                            "authorsManual" => null                                
                        ]
                    ]                
                ]);

        $lp = Lp::where('name', 'test store')->first();

        $this->assertNotNull($lp);
        $response->assertFound()->assertStatus(302);
        $this->assertEquals('test store', $lp->name);
    }    

    public function test_create_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('lps.create'));
        $response
            ->assertStatus(200)
            ->assertSee('Add New LP');           
    }

    public function test_show_page_returns_a_successful_response(): void
    {
        $response = $this->get("/lps/{$this->lp->id}");
        $response
            ->assertStatus(200)
            ->assertSee($this->lp->name);
    }

    public function test_update_an_artist(): void
    {
        $response = $this
            ->put("/lps/{$this->lp->id}",
            [
                'artist_id' => strval($this->lp->artist_id), 
                'name' => 'test lp name updated',
                'description' => $this->lp->description,
                "songsAuthors" => [
                    0 => [
                        "song" => "song1",
                        "authors" => [
                            0 => Author::create(['name' => 'test author'])->id
                        ],
                        "authorsManual" => null                                
                    ]
                ]
            ]);

        $lp = Lp::where('name', 'test lp name updated')->first();
        $this->assertNotNull($lp);
        $response->assertFound()->assertStatus(302);
        $this->assertEquals('test lp name updated', $lp->name);
    }


    public function test_delete_a_lp(): void
    {
        $response = $this
            ->delete("/lps/{$this->lp->id}");

        $lp = Lp::find($this->lp->id);
        $this->assertNull($lp);
        $response
            ->assertFound()
            ->assertStatus(302)
            ->assertSee('Redirecting');
    }


    public function test_edit_page_returns_a_successful_response(): void
    {
        $response = $this->get("/lps/{$this->lp->id}/edit");
        $response
            ->assertStatus(200)
            ->assertSee('Edit LP')
            ->assertSee($this->lp->name);
    }

    public function test_store_new_lp_with_missing_name_returns_error(): void
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $response = $this
        ->post(route('lps.store'),
        [
            'artist_id' => strval(Artist::create(['name' => 'test store', 'description' => 'test store description'])->id),
            'name' => null,
            'description' => 'test store description with name missing']
        );       

        $artist = Lp::where('description', 'test store description with name missing')->first();
        $this->assertNull($artist);
        $response->assertFound()->assertStatus(302);
    }


    public function test_store_new_lp_with_missing_description_returns_error(): void
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $response = $this
        ->post(route('lps.store'),
        [
            'artist_id' => strval(Artist::create(['name' => 'test store', 'description' => 'test store description'])->id),
            'name' => 'test store name with description missing',
            'description' => null]
        
        );

        $artist = Lp::where('name', 'test store name with description missing')->first();

        $this->assertNull($artist);
        $response->assertFound()->assertStatus(302);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->lp);
    }

}
