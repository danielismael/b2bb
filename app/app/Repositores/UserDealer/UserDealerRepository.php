<?php

namespace App\Repositores\UserDealer;

use App\Interfaces\UserDealer\UserDealerInterface;
use App\Models\UserDealerModel;
use App\Repositores\UserDealer\Type\TypeUser;
use Illuminate\Http\JsonResponse;

class UserDealerRepository implements UserDealerInterface
{
    public function getAll() : JsonResponse
    {
        $collection = UserDealerModel::all();

        $all = $collection->map(function ($row) {
            $typeUser = new TypeUser($row->type);

            return [
                'id' => $row->id,
                'id_dealer' => $row->id_dealer,
                'type' => $typeUser->getType(),
                'name' => $row->name,
                'email' => $row->email,
                'updated_at' => date_format($row->created_at, 'd/m/Y H:i:s'),
                'created_at' => date_format($row->created_at, 'd/m/Y H:i:s'),
            ];
        });

        return response()->json([
           'status' => 200,
           'data' =>  $all,
        ]);
    }

    public function getById($id): JsonResponse
    {
        $collection = UserDealerModel::where('id', $id)->get();

        $user = $collection->map(function ($row) {
            $typeUser = new TypeUser($row->type);

            return [
                'id' => $row->id,
                'id_dealer' => $row->id_dealer,
                'type' => $typeUser->getType(),
                'name' => $row->name,
                'email' => $row->email,
                'updated_at' => date_format($row->created_at, 'd/m/Y H:i:s'),
                'created_at' => date_format($row->created_at, 'd/m/Y H:i:s'),
            ];
        });

        if ($user) {
            return response()->json([
               'status' => 200,
               'data' => $user
            ]);
        }

        return response()->json([
            'status' => 404,
            'data' => 'The user was not found.'
        ], 404);
    }

    public function create($request): JsonResponse
    {
        $user = UserDealerModel::create([
            'id_dealer' => $request['id_dealer'],
            'type' => $request['type'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password']
        ]);

        return response()->json([
           'status' => 200,
           'data' => [
               'id' => $user->id,
               'name' => $user->name,
           ]
        ]);
    }
}
