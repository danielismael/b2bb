<?php

namespace App\Repositors\Quotation\Strategy\type;

class RfqTypeStrategy implements TypeStrategyInterface
{
    public function getTypeStrategy() : string
    {
        return "RFQ";
    }
}
