<?php

declare(strict_types=1);

namespace App\UserInterface\Rest\Order;

use App\Application\Order\Command\CreateNewOrder;
use App\Domain\Order\Repository\OrderRepository;
use App\Domain\Order\ValueObject\OrderId;

class CreateOrderAction
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $orderId = OrderId::next();
        $command = new CreateNewOrder($orderId);

        return (string) $orderId;
    }
}
