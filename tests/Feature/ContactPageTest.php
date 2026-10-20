<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactPageTest extends TestCase
{
    public function test_contact_page_shows_contact_details_without_a_form(): void
    {
        $response = $this->get('/contact');

        $response
            ->assertOk()
            ->assertSee('Contact Us')
            ->assertSee('widhipraditya@gmail.com')
            ->assertSee('href="mailto:widhipraditya@gmail.com"', false)
            ->assertSee('+62 858-1063-2983')
            ->assertSee('href="tel:+6285810632983"', false)
            ->assertSee('Jl. Cipinang Latihan RT009/RW014 Cipinang Besar Utara')
            ->assertSee('title="Peta lokasi Travel Indo di Cipinang Besar Utara"', false)
            ->assertSee('https://maps.google.com/maps?', false)
            ->assertSee('Buka di Google Maps')
            ->assertSee('class="ad-whatsapp-float"', false)
            ->assertSee('src="'.asset('assets/whatsapp.png').'"', false)
            ->assertSee('alt=""', false)
            ->assertSee('Contact Us</a>', false)
            ->assertDontSee('<form', false)
            ->assertDontSee('Kirim rencana perjalanan Anda.');
    }
}
