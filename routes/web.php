<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/home', function () {
    return view('home',['title' => 'Home Page']);
});
Route::get('/about', function () {
    return view('about',['name' => 'Irvan H','title' => 'About']);
});
Route::get('/posts', function () {
    return view('posts',['title' => 'Blog','posts' => [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'John Doe',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem consequuntur quis voluptatibus, neque ab hic tempore adipisci. Eaque autem dolorum labore accusantium magni aspernatur ipsum. Sint eligendi unde reiciendis quidem.'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'John Doe',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, voluptas ullam impedit dolore veniam natus qui enim eum perspiciatis exercitationem non iure, sunt nisi ipsa, veritatis blanditiis atque esse quo.'
        ]
    ]]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'John Doe',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem consequuntur quis voluptatibus, neque ab hic tempore adipisci. Eaque autem dolorum labore accusantium magni aspernatur ipsum. Sint eligendi unde reiciendis quidem.'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'John Doe',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, voluptas ullam impedit dolore veniam natus qui enim eum perspiciatis exercitationem non iure, sunt nisi ipsa, veritatis blanditiis atque esse quo.'
        ]
        ];

        //find the first element with matching criteria given by a function
    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post',['title' => 'Single post','post' => $post]);
});
Route::get('/contact', function () {
    return view('contact',['title' => 'Contact']);
});
Route::get('/', function () {
    return view('welcome');
});
