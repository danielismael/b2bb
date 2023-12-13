<?php

namespace App\Http\Controllers\UserDealer;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDealer\NewUserDealerRequest;
use App\Interfaces\UserDealer\UserDealerInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserDealerController extends Controller
{
    public function __construct(
        private UserDealerInterface $user_dealer
    ) {
        $this->middleware('auth:dealer');
    }

    /**
     * @return JsonResponse
     */
    public function getAll() : JsonResponse
    {
        return $this->user_dealer->getAll();
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getById($id) : JsonResponse
    {
        return $this->user_dealer->getById($id);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(NewUserDealerRequest $request)
    {
        return $this->user_dealer->create($request->all());
    }

    /**
     * @param Request $request
     * @return Authenticatable|null
     */
    public function profile(Request $request)
    {
        return Auth()->user();
    }
}
