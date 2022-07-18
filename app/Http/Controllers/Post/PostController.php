<?php

namespace App\Http\Controllers\Post;

use App\Models\Post\Post;
use Illuminate\Http\Request;
Use App\Http\Controllers\Controller;

class PostController extends Controller
{
 
    public function save(Request $request)
    {
        $image = '';
        if($request->hasFile('image')){
            $image = this->saveImage($request);
        }

        $user = \Auth::user();
        $post = new Post($request->all());
        $post->image = $image;
        $user->posts()->save($post);

        return response()->json([
            'saved' => true,
            'post' => $post

        ]);
    }

    public function saveImage($request)
    {
        $key = md5(\Auth::id());
        $path = "/images/posts/".$key."/";

        $has = \Str::random(20);
        $file = $request->file('image');
        $fileName = ($has . $file->getClientOriginalName());

        $file->move(public_path($path), $fileName);

        return ($path . $fileName);
    }
}
