<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public $path = 'images/users/';

    public static function model()
    {
        return User::class;
    }

    public static function findByEmail($email): ?User
    {
        $user = self::query()->where('email', $email)->first();

        return $user;
    }
}
