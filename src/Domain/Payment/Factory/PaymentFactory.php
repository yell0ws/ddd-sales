<?php

declare(strict_types=1);

namespace App\Domain\Payment\Factory;

use App\Domain\Payment\Model\Payment;
use App\Domain\Payment\ValueObject\PaymentId;
use Assert\Assertion;

class PaymentFactory
{
    public static function createFromArray(array $data): Payment
    {
        Assertion::keyExists($data, 'id');

        return new Payment(
            PaymentId::fromString($data['id'])
        );
    }
}
