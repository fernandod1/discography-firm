<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Summary of test_index_page_returns_a_successful_response
     * @return void
     */
    public function test_index_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('index'));     

        $response
            ->assertStatus(200)
            ->assertSee('Lastest LPs and Artists added');
    }
}
