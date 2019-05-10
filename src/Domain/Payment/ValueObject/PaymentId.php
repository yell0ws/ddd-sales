<?php

declare(strict_types=1);

namespace App\Domain\Payment\ValueObject;

use App\Domain\Common\Exception\InvalidIdentityException;
use App\Domain\Common\ValueObject\AggregateRootId;
use Exception;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;

class PaymentId extends AggregateRootId
{
    /**
     * @return PaymentId
     *
     * @throws Exception
     */
    public static function next(): PaymentId
    {
        return new self(
            Uuid::uuid4()
        );
    }

    /**
     * @param string $id
     *
     * @return PaymentId
     *
     * @throws InvalidIdentityException
     */
    public static function fromString(string $id): PaymentId
    {
        try {
            return new self(
                Uuid::fromString($id)
            );
        } catch (InvalidUuidStringException $exception) {
            throw new InvalidIdentityException();
        }
    }
}
