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

        $userId = auth()->id();
        $favorites = DB::table('favorites')
            ->select('user_id')
            ->where('user_id', '=',$userId)
            ->get();
        $count = $favorites->count();
        if ($count >= 5){
            return $count >= 5;
        }
    }
}
