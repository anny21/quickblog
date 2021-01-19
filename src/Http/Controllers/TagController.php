<?php

namespace Devanny\QuickBlog\Http\Controllers;

use Illuminate\Request;
use Devanny\QuickBlog\Models\Tag;
use Devanny\QuickBlog\Http\Requests\TagRequest;
use Illuminate\Support\Str;
use Devanny\QuickBlog\Http\Traits\GetUser;



class TagController extends Controller
{
     use GetUser;

     public function __construct()
   {
       if(config('quickblog.auth') == 'Auth'){

         $this->middleware('quickAuth');

       }
   }
     public function index()
     {
          $tags = Tag::orderBy('id', 'desc')->get();

        return view('quickblog.tag.index', compact('tags'));
     }

     public function create()
     {

          return view('quickblog.tag.create');

     }

     public function store(TagRequest $request)
     {
          Tag::create([
               'name' => strtoupper($request->name),
               'slug' => str_replace(' ', '_', strtolower($request->name)),
               'masked' => Str::random(30)
          ]);

          return back()->with('success', 'Tag created successfully');
     }

     public function edit(Tag $tag)
     {
          return view('quickblog.tag.edit', compact('tag'));

     }

     public function update(Tag $tag, TagRequest $request)
     {
          $tag->update([
               'name' => strtoupper($request->name),
               'slug' => str_replace(' ', '_', strtolower($request->name)),
          ]);

          return redirect()->route('tag.index')->with('success', 'Tag updated successful');
     }

     public function delete(Tag $tag)
     {
          $tag->delete();
          return redirect()->route('tag.index')->with('success', 'Tag deleted successful');

     }
}
