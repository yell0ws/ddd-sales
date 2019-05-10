<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

use Ramsey\Uuid\UuidInterface;

abstract class AggregateRootId
{
    private $id;

    protected function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    abstract public static function generate();

    abstract public static function fromString(string $id);

    public function toString(): string
    {
        return $this->id->toString();
    }

    public function equalTo(AggregateRootId $id): bool
    {
        return $this->toString() === $id->toString() &&
            \get_class($this) === \get_class($id);
    }
}
