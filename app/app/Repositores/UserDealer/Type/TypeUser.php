<?php

namespace App\Repositores\UserDealer\Type;

class TypeUser
{
    private $strategy;

    public function __construct(int $id)
    {
        $this->strategy = TypeUserStrategyFactory::createStrategy($id);
    }

    public function getType() : string
    {
        return $this->strategy->getType();
    }
}
