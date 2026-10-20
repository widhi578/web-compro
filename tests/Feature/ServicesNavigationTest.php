<?php

namespace Tests\Feature;

use Tests\TestCase;

class ServicesNavigationTest extends TestCase
{
    public function test_services_submenu_links_to_blog_article_categories(): void
    {
        $response = $this->get('/blog');

        $response
            ->assertOk()
            ->assertSee('Our Services')
            ->assertSee(route('blog.nature'))
            ->assertSee(route('blog.culture'))
            ->assertSee(route('blog.tips'));

        preg_match('/<ul class="site-nav__submenu"[^>]*>(.*?)<\/ul>/s', $response->getContent(), $submenu);

        $this->assertSame(
            3,
            preg_match_all('/href="[^"]*\/blog\/(alam-petualangan|budaya-rasa-lokal|tips-perjalanan)"/', $submenu[1] ?? '')
        );

        $categoryPage = $this->get(route('blog.nature'));

        $categoryPage
            ->assertOk()
            ->assertSee('aria-current="page"', false);

        $this->assertMatchesRegularExpression(
            '/href="'.preg_quote(route('services'), '/').'"\s+class="is-active"\s+aria-current="page"/',
            $categoryPage->getContent()
        );
    }
}
