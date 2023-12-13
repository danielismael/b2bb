<?php

namespace App\Repositores\UserDealer\Type;

class AdminStrategy implements TypeUserInterface
{
    public function getType(): string
    {
        return 'Admin';
    }
}
