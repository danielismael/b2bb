<?php

namespace App\Repositores\UserDealer\Type;

class UserStrategy implements TypeUserInterface
{
    public function getType(): string
    {
        return 'User';
    }
}
