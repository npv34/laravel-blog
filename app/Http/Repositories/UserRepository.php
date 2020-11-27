<?php


namespace App\Http\Repositories;


use App\Models\User;

class UserRepository
{
    protected $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    function save($user) {
        $user->save();
    }

    function getAll() {
        return $this->userModel->all();
    }
}
