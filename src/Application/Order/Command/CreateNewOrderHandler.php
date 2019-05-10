<?php

declare(strict_types=1);

namespace App\Application\Order\Command;

use App\Domain\Order\Repository\OrderRepository;

class CreateNewOrderHandler
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CreateNewOrder $command): void
    {
        $this->repository->find($command->getOrderId());
    }
}
