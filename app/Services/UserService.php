<?php

namespace App\Services;

use App\Models\User;


class UserService
{
    public static function getUserToken(int $user_id): string
    {
        return User::where('id', $user_id)->pluck('token')[0];
    }
}