<?php

namespace Domain\Localization\Contracts;

interface ChangeLocaleContract
{
    public function __invoke(string $locale): void;
}
