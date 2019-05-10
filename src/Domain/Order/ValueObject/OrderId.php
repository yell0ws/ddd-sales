<?php

declare(strict_types=1);

namespace App\Domain\Order\ValueObject;

use App\Domain\Common\Exception\InvalidIdentityException;
use App\Domain\Common\ValueObject\AggregateRootId;
use Exception;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;

class OrderId extends AggregateRootId
{
    /**
     * @return OrderId
     *
     * @throws Exception
     */
    public static function generate(): OrderId
    {
        return new OrderId(
            Uuid::uuid4()
        );
    }

    /**
     * @throws InvalidIdentityException
     */
    public static function fromString(string $id): OrderId
    {
        try {
            return new OrderId(
                Uuid::fromString($id)
            );
        } catch (InvalidUuidStringException $exception) {
            throw new InvalidIdentityException();
        }
    }
}
