<?php

declare(strict_types=1);

namespace App\Domain\Order\Repository;

use App\Domain\Order\Order;
use App\Domain\Order\ValueObject\OrderId;

interface OrderRepository
{
    public function find(OrderId $orderId): Order;
}
