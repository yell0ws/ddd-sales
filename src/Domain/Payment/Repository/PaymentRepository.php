<?php

declare(strict_types=1);

namespace App\Domain\Payment\Repository;

use App\Domain\Payment\Model\Payment;
use App\Domain\Payment\ValueObject\PaymentId;

interface PaymentRepository
{
    public function find(PaymentId $paymentId): Payment;
}
