<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistance\InMemory\Payment;

use App\Domain\Payment\Model\Payment;
use App\Domain\Payment\Repository\PaymentRepository;
use App\Domain\Payment\ValueObject\PaymentId;
use Exception;

class InMemoryPaymentRepository implements PaymentRepository
{
    /**
     * @var Payment[]|array
     */
    private $payments;

    /**
     * @param array|Payment[] $payments
     */
    public function __construct(array $payments)
    {
        foreach ($payments as $payment) {
            $this->payments[(string) $payment->getId()] = $payment;
        }
    }

    /**
     * @param PaymentId $paymentId
     *
     * @return Payment
     *
     * @throws Exception
     */
    public function find(PaymentId $paymentId): Payment
    {
        if (false === \array_key_exists((string) $paymentId, $this->payments)) {
            throw new Exception(
                \sprintf('Not found payment with uuid %s', (string) $paymentId)
            );
        }

        return $this->payments[(string) $paymentId];
    }
}
