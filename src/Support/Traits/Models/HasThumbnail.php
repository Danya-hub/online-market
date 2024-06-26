<?php

namespace Support\Traits\Models;

use Illuminate\Support\Facades\File;

trait HasThumbnail
{
    abstract protected function thumbnailDir(): string;

    public function makeThumbnail(string $size, string $method = 'resize'): string
    {
        return route('thumbnail', [
            'size' => $size,
            'method' => $method,
            'dir' => $this->thumbnailDir(),
            'file' => File::basename($this->{$this->thumbnailColumn()}),
        ]);
    }

    public function thumbnailColumn(): string {
        return 'thumbnail';
    }
}
