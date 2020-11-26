<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index() {
        $users = [
            [
                "id" => 1,
                "name" => "Tran",
                "email" => "tran@gmail.com",
                "address" => "Hue"
            ],
            [
                "id" => 2,
                "name" => "An",
                "email" => "an@gmail.com",
                "address" => "Hue"
            ],
            [
                "id" => 3,
                "name" => "Nam",
                "email" => "nam@gmail.com",
                "address" => "Hue"
            ]
        ];
        return view('admin.users.list', compact('users'));
    }

    function edit($id) {

    }

    function create() {
        return view('admin.users.create');
    }

    function store(Request $request) {
        dd($request->all());
    }
}
