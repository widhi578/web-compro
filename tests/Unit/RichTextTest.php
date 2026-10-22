<?php

namespace Tests\Unit;

use App\Support\RichText;
use Tests\TestCase;

class RichTextTest extends TestCase
{
    public function test_it_removes_active_content_and_attributes(): void
    {
        $sanitized = RichText::sanitize(
            '<p onclick="alert(1)">Aman</p><script>alert(1)</script><img src=x onerror="alert(1)">'
        );

        $this->assertSame('<p>Aman</p>', $sanitized);
    }
}
