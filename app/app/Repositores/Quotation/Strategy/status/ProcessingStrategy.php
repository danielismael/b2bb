<?php

namespace App\Repositors\Quotation\Strategy\status;

class ProcessingStrategy implements StatusStrategyInterface
{
    public function getStatus(): string
    {
        return "Processing";
    }
}
