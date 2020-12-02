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
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $this->userRepository->save($user, $request->roles);
    }

    function getAll() {
        return $this->userRepository->getAll();
    }

    function findById($id) {
        return $this->userRepository->find($id);
    }

    function update($user, $request) {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $this->userRepository->save($user);
    }
}
