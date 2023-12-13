<?php

namespace App\Http\Controllers\Quotation;

use App\Interfaces\Quotation\QuotationInterface;
use Illuminate\Http\Request;

class QuotationController
{
    public function __construct(
        private QuotationInterface $quotation
    ) {}

    public function getAllQuotation()
    {
        return $this->quotation->getAllQuotation();
    }

    public function getQuotation(Request $request)
    {
        return $this->quotation->getQuotation($request->only('id'));
    }

    public function createQuotation(Request $request)
    {
        return $this->quotation->createQuotation($request->all());
    }

    public function updateQuotation(Request $request)
    {
        return $this->quotation->updateQuotation($request->all());
    }
}
