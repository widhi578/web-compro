<?php

namespace Tests\Feature;

use App\Support\WebResourceManager;
use Tests\TestCase;

class FaviconTest extends TestCase
{
    public function test_public_and_admin_pages_declare_the_travel_indo_favicon(): void
    {
        $favicon = app(WebResourceManager::class)->url('site-favicon');

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('rel="icon" href="'.$favicon.'" type="image/svg+xml"', false);

        $this->get(route('admin.login'))
            ->assertOk()
            ->assertSee('rel="icon" href="'.$favicon.'" type="image/svg+xml"', false);
    }
}
