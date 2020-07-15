<?php


/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Routes
|--------------------------------------------------------------------------
*/


// Route::get('/insert', function(){

//     DB::insert('insert into posts(title, content) values(?,?)',['PHP with Laravel','Laravel is the best thing that has happened to PHP']);
// });


Route::get('/read', function() {
    $results = DB::select('select * from posts where id = ?', [1]);

    return var_dump($results);
    // foreach($results as $post) {
    //     return $post->title;
    // }
});


Route::get('/update', function(){
    $update = DB::update('update posts set title = " Update title" where id = ?', [1]);
    return $update;
});


Route::get('/delete', function(){
    $deleted = DB::delete('delete from posts where id = ?', [1]);
    return $deleted;
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return "<h1>Hi about page</h1>";
// });

// Route::get('/contact', function () {
//     return "hi I am contact";
// });

// Route::get('/post/{id}', function ($id) {
//     return "This is post number ". $id;
// });

// Route::get('admin/posts/example', array('as'=>'admin.home' ,function(){
//     $url = route('admin.home');

//     return "this url is ". $url;
// }));

// Route::get('/post/{id}', 'PostsController@index');

// Route::resource('posts', 'PostsController');

// Route::resource('/contact', 'PostsController@contact');

// Route::get('post/{id}/{name}/{password}', 'PostsController@show_post');

