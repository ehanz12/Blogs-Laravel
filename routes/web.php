<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('Home', ["title" => 'Home Page']);
}); 

Route::get('/Blogs', function () {
    
    return view('Blogs', ["title" => 'Blog', 'blogs' => Blog::filter(request(['Search', 'Category', 'Author']))->latest()->paginate(6)]);
}); 



Route::get('/blog/{blog:slug}', function (Blog  $blog){
    return view('blog', ["title" => 'single blog', 'blog' => $blog]);
});


Route::get('/authors/{user:username}', function (User $user){
    // $blogs = $user->blogs->load('category', 'author');
    return view('blogs', ["title" => count($user->blogs) . ' Articles By '. $user->name, 'blogs' => $user->blogs]);
});

Route::get('/categories/{category:slug}', function (Category $category){
    // $blogs = $category->blogs->load('category', 'author');
    return view('blogs', ["title" => count($category->blogs) . ' Articles In :  '. $category->name , 'blogs' => $category->blogs]);
});

Route::get('/Contact', function () {
    return view('Contact', ["title" => 'Contact']);
}); 

Route::get('/Sosial', function () {
    return view('sosialmedia', ["title" => 'Sosial Media']);
}); 