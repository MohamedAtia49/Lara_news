<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;


use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $posts = Post::all();
        $posts = Post::paginate(3);
        return view('posts.index' , compact('posts'));
    }

    public function create()
    {
        return view('posts.create')->with('categories' , Category::all());
    }

    public function store(Request $request)
    {
        // 1 Validate
        $this->validate($request,[
            "title" => "required|max:255|min:3",
            "image" => "required|image|mimes:png,jpg,svg,jpeg",
        ]);

        //upload image
        $image =$request->file('image');
        $image_name = time().$image->getClientOriginalName();
        $image ->move('images' ,$image_name);

        //store in DB
        $post = Post::create([
            "title" => $request->title ,
            "category_id" => $request->category_id ,
            "content" => $request->content ,
            "image" => "images/$image_name" ,
        ]);

        //redirect
        return redirect()->route('posts')->with("message" , "Post Added successfully");
    }//store

    public function show(Post $post)
    {
        return view('posts.show' ,compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit' ,compact('post'))->with('posts' , $post)->with('categories' , Category::all());
    }


    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts')->with("message" , "Post deleted successfully");
    }
}
