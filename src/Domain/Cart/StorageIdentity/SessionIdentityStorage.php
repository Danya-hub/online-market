<?php

namespace Domain\Cart\StorageIdentity;

use Domain\Cart\Contracts\CartIdentityStorageContract;

class SessionIdentityStorage implements CartIdentityStorageContract
{
    public function get(): string
    {
        return session()->getId();
    }
}
