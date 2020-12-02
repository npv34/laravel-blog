<?php


namespace App\Http\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    protected $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    function save($user, $roles = null)
    {
        DB::beginTransaction();
        try {
            $user->save();
            $user->roles()->sync($roles);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

    }

    function attachRole($user, $roles = null) {
        $user->roles()->attach($roles);
    }

    function getAll()
    {
        return $this->userModel->all();
    }

    function find($id)
    {
        return $this->userModel->findOrFail($id);
    }
}
