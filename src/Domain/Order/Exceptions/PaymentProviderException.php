<?php

namespace Domain\Order\Exceptions;

use Exception;

class PaymentProviderException extends Exception
{
    /**
     * @throws PaymentProviderException
     */
    public static function providerRequired(): self
    {
        throw new self('Provider is required');
    }
}
