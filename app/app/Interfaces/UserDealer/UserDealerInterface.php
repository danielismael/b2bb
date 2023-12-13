<?php

namespace App\Interfaces\UserDealer;

use Illuminate\Http\JsonResponse;

interface UserDealerInterface
{
    public function getAll() : JsonResponse;
    public function getById($id) : JsonResponse;
    public function create($request) : JsonResponse;
}
