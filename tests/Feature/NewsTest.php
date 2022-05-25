<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCheckNewsIndex(): void
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }

    public function testCheckNewsShow()
    {
        $response = $this->get(route('news.show'));

        $response->assertStatus(200);
    }

    public function testCheckNewsAdd()
    {
        $response = $this->get(route('news.add'));

        $response->assertStatus(200);
    }
}
