<?php

declare(strict_types=1);

namespace App\Test\Unit\Infrastructure\Persistance\InMemory\Payment;

use App\Domain\Payment\Model\Payment;
use App\Domain\Payment\ValueObject\PaymentId;
use App\Infrastructure\Persistance\InMemory\Payment\InMemoryPaymentRepository;
use Exception;
use PHPUnit\Framework\TestCase;

class InMemoryPaymentRepositoryTest extends TestCase
{
    /**
     * @var InMemoryPaymentRepository
     */
    private $repository;

    /**
     * @var array|Payment[]
     */
    private $payments;

    /**
     * @test
     */
    public function shouldReturnPaymentById(): void
    {
        $payment = $this->repository->find(
            PaymentId::fromString('da981ef9-92fa-4f67-a3ac-6d323aa71204')
        );

        $this->assertInstanceOf(Payment::class, $payment);
        $this->assertEquals('da981ef9-92fa-4f67-a3ac-6d323aa71204', (string) $payment->getId());
    }

    /**
     * @test
     */
    public function shouldThrowExceptionIfPaymentNotFound(): void
    {
        $paymentId = PaymentId::fromString('0204a846-c939-4262-abd4-332197d8158e');

        $this->expectException(Exception::class);
        $this->expectExceptionMessage(\sprintf('Not found payment with uuid %s', (string) $paymentId));

        $this->repository->find(
            $paymentId
        );
    }

    protected function setUp(): void
    {
        $this->payments = [
            new Payment(
                PaymentId::fromString('da981ef9-92fa-4f67-a3ac-6d323aa71204')
            ),
        ];

        $this->repository = new InMemoryPaymentRepository($this->payments);
    }
}
