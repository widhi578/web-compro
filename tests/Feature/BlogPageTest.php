<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_page_displays_travel_articles_with_expandable_details(): void
    {
        $this->seed();

        $response = $this->get('/blog');

        $response
            ->assertOk()
            ->assertSee('Jelajahi cerita dan inspirasi perjalanan.')
            ->assertSee('Melihat sisi Bali lewat tradisi dan kehidupan desa')
            ->assertSee('Merencanakan perjalanan laut ke Labuan Bajo')
            ->assertSee('Menjelajah Raja Ampat dengan lebih bertanggung jawab')
            ->assertSee('Baca selengkapnya')
            ->assertSee('<details class="blog-card__more">', false)
            ->assertSee('id="alam-petualangan"', false)
            ->assertSee('id="budaya-lokal"', false)
            ->assertSee('id="tips-perjalanan"', false)
            ->assertDontSee('id="rute-antarkota"', false)
            ->assertDontSee('id="perjalanan-bersama"', false)
            ->assertDontSee('id="perjalanan-khusus"', false)
            ->assertSee('RENCANAKAN BERSAMA');
    }
}
