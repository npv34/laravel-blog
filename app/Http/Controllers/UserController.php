<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    function index()
    {
        $users = $this->userService->getAll();
        return view('admin.users.list', compact('users'));
    }

    function edit($id)
    {
        $user = $this->userService->findById($id);
        return view('admin.users.edit', compact('user'));
    }

    function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    function update($id, Request $request) {

        $user = $this->userService->findById($id);
        $this->userService->update($user, $request);
        return redirect()->route('users.index');
    }

    function store(Request $request)
    {
        $this->userService->create($request);
        return redirect()->route('users.index');
    }
}
