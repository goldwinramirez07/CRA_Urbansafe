<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndexViewTest extends TestCase
{
    /**
     * Simple feature test that checks the rendered index page contains
     * key markup from resources/views/index.blade.php.
     */
    public function test_index_contains_expected_markup()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Check for specific raw HTML snippets (pass false to avoid HTML escaping)
        $response->assertSee('<a href="/login">UrbanSafe</a>', false);
        $response->assertSee('<a href="/report">Report Incident</a>', false);
        $response->assertSee('<a href="/register">Sign up</a>', false);
    }

}
