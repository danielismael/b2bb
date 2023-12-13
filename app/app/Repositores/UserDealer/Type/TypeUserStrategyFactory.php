<?php

namespace App\Repositores\UserDealer\Type;

use http\Exception\InvalidArgumentException;

class TypeUserStrategyFactory
{
    public static function createStrategy(int $id) : TypeUserInterface
    {
        return match ($id) {
            1 => new AdminStrategy(),
            default => new UserStrategy(),
        };
    }
}
