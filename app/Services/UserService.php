<?php

namespace App\Services;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function index()
    {
        return User::orderBy('id', 'desc')->paginate(15);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function find(int $user_id)
    {
        return User::find($user_id);
    }

    public function update(int $user_id, array $data)
    {
        return User::where('id', $user_id)->update($data);
    }  

    public function destroy(int $user_id)
    {
        return User::find($user_id)->delete();
    }
}