<?php

namespace App\Interfaces\Quotation;

interface QuotationInterface
{
    public function getAllQuotation();
    public function getQuotation($id);
    public function createQuotation($request);
    public function updateQuotation($request);
}
