<?php

namespace App\Support;

use InvalidArgumentException;

/**
 * Provides one controlled registry for the public site's static resources.
 *
 * Local files receive a version derived from their modification time. A
 * browser can therefore cache them for a long time while users still receive
 * a new URL immediately after an asset is changed.
 */
class WebResourceManager
{
    /** @var array<string, array{path: string, as: string}> */
    private array $resources;

    /** @param array<string, mixed> $resources */
    public function __construct(array $resources)
    {
        $this->resources = $resources;
    }

    public function url(string $name): string
    {
        $resource = $this->resources[$name] ?? null;

        if (! is_array($resource) || ! isset($resource['path'])) {
            throw new InvalidArgumentException("Web resource [{$name}] is not registered.");
        }

        $path = $resource['path'];
        $version = $this->version($path);

        return asset($path).($version === null ? '' : '?v='.$version);
    }

    /** @return array<int, array{href: string, crossorigin: bool}> */
    public function preconnects(): array
    {
        return config('web-resources.preconnects', []);
    }

    public function fontStylesheet(): string
    {
        return (string) config('web-resources.fonts.primary.stylesheet');
    }

    private function version(string $path): ?int
    {
        $file = public_path($path);

        return is_file($file) ? filemtime($file) : null;
    }
}
