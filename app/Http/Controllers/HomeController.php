<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Category;
use App\Models\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $type = 2;
        if (Auth::user()) {
            $type = Auth::user()->tipo;
        }
        $categories = Category::all();
        $posts = Post::all();

        return view('posts', [
            'categories' => $categories,
            'posts' =>$posts,
            'type' => $type
        ]);
    }

    public function post($postId)
    {
        $type = 2;
        if (Auth::user()) {
            $type = Auth::user()->tipo;
        }
        $categories = Category::all();
        $posts = Post::all();
        $post = Post::find($postId);

        return view('post', [
            'categories' => $categories,
            'posts' => $posts,
            'post' => $post,
            'type' => $type
        ]);
    }

    public function postByCategory($category)
    {
        $type = 2;
        if (Auth::user()) {
            $type = Auth::user()->tipo;
        }
        $categories = Category::all();
        $category = Category::where('name', '=', $category)->first();
        $categoryIdSelected = $category->id;
        $posts = Post::where('category_id', '=', $categoryIdSelected)->get();
        return view('posts', [
            'categories' => $categories,
            'posts' => $posts,
            'categoryIdSelected' => $categoryIdSelected,
            'type' => $type
        ]);
}

    /*public function post($postId)
    {
        $post = Post::find($postId);
        return view('post', ['post' => $post]);
    }*/
}
