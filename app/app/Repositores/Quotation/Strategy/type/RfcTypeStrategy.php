<?php

namespace App\Repositors\Quotation\Strategy\type;

class RfcTypeStrategy implements TypeStrategyInterface
{
    public function getTypeStrategy() : string
    {
        return "RFC";
    }
}
