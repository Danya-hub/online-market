<?php

namespace Domain\Order\Exceptions;

use Exception;

class PaymentProcessException extends Exception
{
    /**
     * @throws PaymentProcessException
     */
    public static function paymentNotFound(): self
    {
        throw new self('Payment is not found');
    }
}
