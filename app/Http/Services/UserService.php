<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function create($request) {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role_id = 1;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $this->userRepository->save($user);
    }

    function getAll() {
        return $this->userRepository->getAll();
    }
}
