<?php

declare(strict_types=1);

namespace App\Domain\Order;

use App\Domain\Order\ValueObject\OrderId;

class Order
{
    private $id;

    public function __construct(OrderId $id)
    
        $this->id = $id;
    

    public function id(): OrderId
    {
        return $this->id;
    }
}
