<?php

namespace App\Http\Controllers;

use Database\Factories\ProductFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Mockery;
use Tests\TestCase;

class ThumbnailControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function it_find_size_fail(): void
    {
        $size = "0x0";

        self::assertNotContains(
            $size,
            config('thumbnail.allowed_sizes', []),
            'Size is not allowed'
        );
    }

    public function it_generated_exists(): void
    {
        $size = "0x0";
        $method = "resize";
        $storage = Storage::disk('images');

        config()->set('thumbnail', ['allowed_sizes' => [$size]]);

        $product = ProductFactory::new()->create();

        $response = $this->get($product->makeThumbnail($size, $method));

        $response->assertOk();

        $storage->assertExists(
            "products/$method/$size/" . basename($product->thumbnail),
        );
    }
}
