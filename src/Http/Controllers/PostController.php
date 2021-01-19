<?php

namespace Devanny\QuickBlog\Http\Controllers;

use Devanny\QuickBlog\Http\Requests\PostRequest;
use Devanny\QuickBlog\Eloquent\Post;
use Devanny\QuickBlog\Eloquent\Category;
use Devanny\QuickBlog\Eloquent\Tag;
use Devanny\QuickBlog\Http\Traits\GetUser;
use Illuminate\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
   use GetUser;

   public function __construct()
   {
       if(config('quickblog.auth') == 'Auth'){

         $this->middleware('quickAuth')->except(['index', 'show']);

       }
   }

     public function index()
     {
        
         $posts = Post::orderBy('id', 'desc')->paginate(3);
         $posts = Post::inRandomOrder()->paginate(7);
         $tags = Tag::orderBy('id', 'desc')->get();
         $categories = Category::orderBy('id', 'desc')->get();
         return view('quickblog.post.index', compact('posts', 'categories', 'tags'));
     }

     public function getRandomPost() 
     {
      $post = Post::inRandomOrder()->paginate();
      return redirect()->route('post.show', ["id" => $post->id]);
     }

     public function create()
     {
        //return view
        $tags = Tag::orderBy('id', 'desc')->get();

        $categories = Category::orderBy('id', 'desc')->get();

        return view('quickblog.post.create', compact('categories', 'tags'));
     }

     public function store(PostRequest $request)
     {
    
        $imageName = null;
        if($request->hasFile('banner')){
            // Storage::makeDirectory('post banner');
            $imageName = time().'.'.$request->banner->extension(); 
            $request->banner->storeAs('public/postBanners', $imageName);
        }

        Post::where('slug', str_replace(' ', '_', strtolower($request->title)))->first() ? 
        $slug = str_replace(' ', '_', strtolower($request->title)) . '_' . Str::random(4) : $slug = str_replace(' ', '_', strtolower($request->title));

        Post::create([
            'user_id' => $this->getUser(),
            'title' => $request->title,
            'body' => $request->body,
            'slug' => $slug,
            'category' => json_encode($request->categories),
            'tag' => json_encode($request->tags),
            'banner' => $imageName,
            'masked' => Str::random(30)
        ]);

        return back()->with('message', 'Post created successfully');
     }

     public function show(Post $post)
     {
        return view('quickblog.post.show', compact('post'));
     }

     public function edit(Post $post)
     {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('quickblog.post.edit', compact('post', 'categories'));

     }

     public function update(Post $post, PostRequest $request)
     {
        $imageName = null;
        if($request->hasFile('banner')){
            // Storage::makeDirectory('post banner');
            $imageName = time().'.'.$request->banner->extension(); 
            $request->banner->storeAs('public/postBanners', $imageName);
        }

        $request->merge(['banner' => $imageName, 'category'=> json_encode($request->categories), 'tag'=> json_encode($request->tags)]);
        $post->update($request->except('categories', 'tags'));

        return redirect()->route('post.index')->with('success', 'Post updated successfully');
     }
//php artisan vendor:publish --provider="Devanny\QuickBlog\QuickBlogServiceProvider" --tag="blog"
     public function delete(Post $post)
     {
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');

     }
}
