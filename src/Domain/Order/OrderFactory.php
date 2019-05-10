<?php

declare(strict_types=1);

namespace App\Domain\Order;

use App\Domain\Order\ValueObject\OrderId;
use Assert\Assertion;

class OrderFactory
{
    public static function createFromArray(array $data): Order
    {
        Assertion::keyExists($data, 'id');

        return new Order(
            OrderId::fromString($data['id'])
        );
    }
}
