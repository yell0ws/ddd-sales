<?php

declare(strict_types=1);

namespace App\Application\Order\Command;

use App\Domain\Order\ValueObject\OrderId;

class CreateNewOrder
{
    private $orderId;

    public function __construct(OrderId $orderId)
    {
        $this->orderId = $orderId;
    }

    public function getOrderId(): OrderId
    {
        return $this->orderId;
    }
}
