<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostFavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request)
    {
        if ($post->favoritedBy($request->user())) {
            return response(null,409);
        }

        $post->favorites()->create([
            'user_id' =>$request->user()->id,
        ]);

        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        $request->user()->favorites()->where('post_id', $post->id)->delete();

        return back();
    }

    public function deepVal($table)
    {
        $access = DB::table('favorites')
            ->groupBy('user_id')
            ->count();
    }
}
