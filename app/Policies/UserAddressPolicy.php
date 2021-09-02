<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\UserAddress;

class UserAddressPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function own(User $user, UserAddress $address)
    {
        return $address->user_id == $user->id;
    }
}
