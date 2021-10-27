<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;

class FavoritePolicy
{
    use HandlesAuthorization;

    public function deepVal()
    {
         $users = DB::table('favorites')->count('user_id');
         return $users >= 5;
    }
}
