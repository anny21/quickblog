<?php






use Devanny\QuickBlog\Http\Controllers\PostController;
use Devanny\QuickBlog\Http\Controllers\CategoryController;
use Devanny\QuickBlog\Http\Controllers\TagController;
use Devanny\QuickBlog\Http\Controllers\CommentController;


Route::group(['middleware' => ['web']], function () {

Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/edit/{category:masked}', [CategoryController::class, 'edit'])->name('category.edit');
Route::get('category/show/{category:masked}', [CategoryController::class, 'show'])->name('category.show');
Route::delete('category/delete/{category:masked}', [CategoryController::class, 'delete'])->name('category.delete');
Route::patch('category/update/{category:masked}', [CategoryController::class, 'update'])->name('category.update');
// Route::get('category/create', [CategoryController::class, 'create'])->name('create-category');
Route::post('categories', [CategoryController::class, 'store'])->name('create-category');

//post routes
Route::get('posts', [PostController::class, 'index'])->name('post.index');
Route::get('post/edit/{post:masked}', [PostController::class, 'edit'])->name('post.edit');
Route::get('post/show/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::delete('post/delete/{post:masked}', [PostController::class, 'delete'])->name('post.delete');
Route::patch('post/update/{post:masked}', [PostController::class, 'update'])->name('post.update');
Route::get('post/create', [PostController::class, 'create'])->name('create-post');
Route::post('posts', [PostController::class, 'store'])->name('create-post');


//tags
Route::get('tags', [TagController::class, 'index'])->name('tag.index');
Route::get('tag/edit/{tag:masked}', [TagController::class, 'edit'])->name('tag.edit');
Route::post('tags', [TagController::class, 'store'])->name('create-tag');
Route::patch('tag/update/{tag:masked}', [TagController::class, 'update'])->name('tag.update');
Route::delete('tag/delete/{tag:masked}', [TagController::class, 'delete'])->name('tag.delete');


//comment
Route::post('comment', [CommentController::class, 'store'])->name('create-comment');


});