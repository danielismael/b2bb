<?php

namespace App\Repositors\Quotation\Strategy\type;

class RfiTypeStrategy implements TypeStrategyInterface
{
    public function getTypeStrategy() : string
    {
        return "RFI";
    }
}
