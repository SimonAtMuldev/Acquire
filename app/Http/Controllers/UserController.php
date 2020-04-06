<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use App\Http\Resources\User as UserResource;


class UserController extends Controller
{
    public function userList() {
//        return UserResource::collection(User::all()->keyBy->id);

        $this->authorize('viewAny', User::class);
        return UserResource::collection(User::all());
//        return UserResource::collection(\request()->user()->keyBy->id);

//        $this->authorize('viewAny', User::class);
//        return UserResource::collection(\request()->user()->users);

//        $users = User::all()->except(Auth::id());
//        return $users;
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        return new UserResource($user);
    }

    private function validationData()
    {
        return request()->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'role'    => 'required',
            'wins'    => 'required',
        ]);
    }
}
