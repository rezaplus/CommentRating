<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


/**
 * Api core controller
 * Get posts & comments from wordpress
 */
Route::post('/api','rezaplus\cmr\Http\Controllers\ApiController@insert');

/**
 * Posts view page
 * Display all posts with raitng
 */
Route::get('/posts', function () {
    $posts = DB::select('select * from wp_posts ORDER BY post_rate DESC');
    if(empty($posts)){
        return 'There is no Post';
    }
    return view('cmr::posts', compact('posts'));
});

/**
 * Comments view page
 * display post comments with raiting
 */
Route::get('/posts/comments/', function () {
    $comments = DB::select("select * from wp_comments where post_id=".$_GET['post']." ORDER BY rate DESC");
        if(empty($posts)){
        return 'There is no Comment';
    }
    return view('cmr::comments', compact('comments'));
});
