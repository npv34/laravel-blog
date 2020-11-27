<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
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

    }

    function create()
    {
        return view('admin.users.create');
    }

    function store(Request $request)
    {
        $this->userService->create($request);
        return redirect()->route('users.index');
    }
}
