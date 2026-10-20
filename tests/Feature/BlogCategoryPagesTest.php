<?php

namespace Tests\Feature;

use Tests\TestCase;

class BlogCategoryPagesTest extends TestCase
{
    public function test_each_service_subcategory_opens_its_own_news_article_page(): void
    {
        $pages = [
            [
                'url' => '/blog/alam-petualangan',
                'title' => 'Alam & Petualangan',
                'article' => 'Menikmati alam Indonesia dengan persiapan yang matang',
            ],
            [
                'url' => '/blog/budaya-rasa-lokal',
                'title' => 'Budaya & Rasa Lokal',
                'article' => 'Perjalanan yang lebih dekat dengan budaya lokal',
            ],
            [
                'url' => '/blog/tips-perjalanan',
                'title' => 'Tips Perjalanan',
                'article' => 'Menyusun rute perjalanan agar tidak habis di jalan',
            ],
        ];

        foreach ($pages as $page) {
            $this->get($page['url'])
                ->assertOk()
                ->assertSee($page['title'])
                ->assertSee($page['article'])
                ->assertSee('Cerita lainnya')
                ->assertSee('RENCANAKAN BERSAMA');
        }
    }
}
