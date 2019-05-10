<?php

declare(strict_types=1);

namespace App\Domain\Common\Exception;

use Exception;

class InvalidIdentityException extends Exception
{
    public function __construct()
    {
        parent::__construct();
    }
}
