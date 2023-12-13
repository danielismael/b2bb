<?php

namespace App\Repositors\Quotation\Strategy\status;

class CompletedStrategy implements StatusStrategyInterface
{
    public function getStatus(): string
    {
        return "Completed";
    }
}
