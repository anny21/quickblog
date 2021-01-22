<?php

namespace Devanny\QuickBlog\Http\Controllers;

use Devanny\QuickBlog\Http\Requests\CategoryRequest;
use Devanny\QuickBlog\Http\Traits\GetUser;
use Devanny\QuickBlog\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use GetUser;

    public function __construct()
    {
        if (config('quickblog.auth') == 'Auth') {

            $this->middleware('quickAuth');

        }
    }
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('quickblog.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('quickblog.category.create', compact('categories'));

    }

    public function store(CategoryRequest $request)
    {

        Category::create([
            'name' => strtoupper($request->name),
            'slug' => str_replace(' ', '_', strtolower($request->name)),
            'masked' => Str::random(30),
        ]);

        return back()->with('message', 'Category created successfully');

    }

    public function show(Category $category)
    {
        return view('quickblog.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('quickblog.category.edit', compact('category'));

    }

    public function update(Category $category, CategoryRequest $request)
    {

        $category->update([
            'name' => strtoupper($request->name),
            'slug' => strtolower($request->name),
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    public function delete(Category $category)
    {
        // Search
        //  $posts = Post::where('category', 'LIKE', '%' . $category->name . '%')->get();

        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');

    }
}
