<?php

namespace Tests\Feature\Admin;

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
    public function testCheckAdminNewsIndex(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testCheckAdminNewsCreate()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testCheckAdminNewsStore()
    {
        $data = [
            'title' => 'Some title',
            'author' => 'Some author',
            'status' => 'active',
            'description' => 'Some description'
        ];

        $response = $this->post(route('admin.news.store'), $data);

        $response->assertJson($data);
    }
}
