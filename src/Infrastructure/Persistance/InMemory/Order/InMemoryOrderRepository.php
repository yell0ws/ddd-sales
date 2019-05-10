<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistance\InMemory\Order;

use App\Domain\Order\Order;
use App\Domain\Order\Repository\OrderRepository;
use App\Domain\Order\ValueObject\OrderId;
use Exception;

class InMemoryOrderRepository implements OrderRepository
{
    /**
     * @var Order[]|array
     */
    private $orders;

    /**
     * @param array|Order[] $orders
     */
    public function __construct(array $orders)
    {
        foreach ($orders as $order) {
            $this->orders[(string) $order->id()] = $order;
        }
    }

    /**
     * @param OrderId $orderId
     *
     * @return Order
     *
     * @throws Exception
     */
    public function find(OrderId $orderId): Order
    {
        if (false === \array_key_exists((string) $orderId, $this->orders)) {
            throw new Exception(
                \sprintf('Not found payment with uuid %s', (string) $orderId)
            );
        }

        return $this->orders[(string) $orderId];
    }
}
