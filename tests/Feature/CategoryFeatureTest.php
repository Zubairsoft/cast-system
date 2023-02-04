<?php

namespace Tests\Feature;

use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryFeatureTest extends TestCase
{
    use RefreshDatabase;
    /**
     * test index status code of 
     */
    public function test_status_code_for_index_of_category_feature(): void
    {
        $response = $this->get('api/v1/dashboard/admin/category');

        Auth::check() ? $response->assertStatus(200) : $response->assertStatus(401);
    }

    public function test_status_code_for_store_category_feature()
    {
        $response = $this->post('api/v1/dashboard/admin/category');

        Auth::check() ? $response->assertStatus(200) : $response->assertStatus(401);
    }
}
