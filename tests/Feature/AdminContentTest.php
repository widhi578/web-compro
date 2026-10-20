<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\SiteContent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class AdminContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_update_homepage_content_without_editing_the_view(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $fields = collect(config('cms.pages.home.groups'))
            ->flatMap(fn (array $group) => $group['fields']);
        $content = $fields->mapWithKeys(fn (array $field) => [
            $field['key'] => SiteContent::value($field['key']),
        ])->all();
        $content['home.hero.title'] = "Jelajahi Indonesia\nBersama Kami";

        $this->actingAs($admin)
            ->put(route('admin.content.update', 'home'), ['content' => $content])
            ->assertRedirect(route('admin.content.edit', 'home'))
            ->assertSessionHas('status');

        $this->assertDatabaseHas('site_contents', [
            'key' => 'home.hero.title',
            'value' => "Jelajahi Indonesia\nBersama Kami",
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Jelajahi Indonesia')
            ->assertSee('Bersama Kami');
    }

    public function test_non_admin_cannot_access_the_content_panel(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $this->actingAs($user)
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }

    public function test_admin_can_upload_a_homepage_image(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $fields = collect(config('cms.pages.home.groups'))
            ->flatMap(fn (array $group) => $group['fields']);
        $content = $fields->mapWithKeys(fn (array $field) => [
            $field['key'] => SiteContent::value($field['key']),
        ])->all();

        $this->actingAs($admin)
            ->put(route('admin.content.update', 'home'), [
                'content' => $content,
                'image_uploads' => [
                    'home.hero.slide1.image' => UploadedFile::fake()->image('hero.png'),
                ],
            ])
            ->assertRedirect(route('admin.content.edit', 'home'));

        $imagePath = SiteContent::value('home.hero.slide1.image');
        $this->assertStringStartsWith('/uploads/content/', $imagePath);
        $this->assertFileExists(public_path(ltrim($imagePath, '/')));

        File::delete(public_path(ltrim($imagePath, '/')));
    }

    public function test_admin_can_edit_gallery_text_and_publish_blog_articles(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $fields = collect(config('cms.pages.gallery.groups'))
            ->flatMap(fn (array $group) => $group['fields']);
        $content = $fields->mapWithKeys(fn (array $field) => [
            $field['key'] => SiteContent::value($field['key']),
        ])->all();
        $content['gallery.1.title'] = 'Pantai pilihan Travel Indo';

        $this->actingAs($admin)
            ->put(route('admin.content.update', 'gallery'), ['content' => $content])
            ->assertRedirect(route('admin.content.edit', 'gallery'));

        $this->get(route('gallery'))
            ->assertOk()
            ->assertSee('Pantai pilihan Travel Indo');

        $this->post(route('admin.articles.store'), [
            'title' => 'Jelajah tersembunyi di Indonesia',
            'category' => 'alam-petualangan',
            'excerpt' => 'Temukan rute alam yang lebih tenang.',
            'content' => 'Artikel baru dari panel admin.',
            'image' => UploadedFile::fake()->image('article.jpg'),
            'image_alt' => 'Pemandangan alam Indonesia',
            'reading_time' => '3 menit baca',
            'is_published' => '1',
        ])->assertRedirect(route('admin.articles.index'));

        $this->get(route('blog'))
            ->assertOk()
            ->assertSee('Jelajah tersembunyi di Indonesia');

        $articleImage = Article::query()
            ->where('title', 'Jelajah tersembunyi di Indonesia')
            ->value('image');
        File::delete(public_path(ltrim($articleImage, '/')));
    }
}
