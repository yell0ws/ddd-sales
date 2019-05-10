<?php

declare(strict_types=1);

namespace App\Domain\Payment\Model;

use App\Domain\Payment\ValueObject\PaymentId;

class Payment
{
    private $paymentId;

    public function __construct(PaymentId $paymentId)
    {
        $this->paymentId = $paymentId;
    }

    public function getId()
    {
        return $this->paymentId;
    }
}
