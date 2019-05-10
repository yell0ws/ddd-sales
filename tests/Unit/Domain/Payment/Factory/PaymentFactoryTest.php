<?php

declare(strict_types=1);

namespace App\Test\Unit\Domain\Payment\Factory;

use App\Domain\Payment\Factory\PaymentFactory;
use Assert\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PaymentFactoryTest extends TestCase
{
    /** @test */
    public function shouldReturnPaymentDomainObject(): void
    {
        $data = [
            'id' => 'da981ef9-92fa-4f67-a3ac-6d323aa71204',
        ];

        $payment = PaymentFactory::createFromArray($data);

        $this->assertSame($data['id'], (string) $payment->getId());
    }

    /** @test */
    public function shouldReturnExceptionWhenIdNotExists(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "id"');

        $data = [
            'uuid' => 'da981ef9-92fa-4f67-a3ac-6d323aa71204',
        ];

        PaymentFactory::createFromArray($data);
    }
}
