<?php

namespace Tests\Unit;

use App\Support\WebResourceManager;
use InvalidArgumentException;
use Tests\TestCase;

class WebResourceManagerTest extends TestCase
{
    public function test_registered_local_assets_have_a_cache_busting_version(): void
    {
        $url = app(WebResourceManager::class)->url('public-styles');

        $this->assertStringStartsWith(asset('css/styles.css').'?v=', $url);
    }

    public function test_an_unregistered_resource_cannot_be_rendered(): void
    {
        $this->expectException(InvalidArgumentException::class);

        app(WebResourceManager::class)->url('untrusted-resource');
    }
}
