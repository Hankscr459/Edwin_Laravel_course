<?php
use App\Post;

/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Routes
|--------------------------------------------------------------------------
*/


Route::get('/insert', function(){

    DB::insert('insert into posts(title, content) values(?,?)',['PHP','PHP is best for web program.']);
});


// Route::get('/read', function() {
//     $results = DB::select('select * from posts where id = ?', [1]);

//     return var_dump($results);
//     // foreach($results as $post) {
//     //     return $post->title;
//     // }
// });


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



/*
|--------------------------------------------------------------------------
| Eloquent
|--------------------------------------------------------------------------
*/

// Route::get('/read', function(){

//     $posts = Post::all();

//     foreach($posts as $post) {
//         return $post->title;
//     }
// });

// Route::get('/find', function(){

//     $post = Post::find(2);
//     return $post->title;
// });

Route::get('/findwhere', function(){
    $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();
    return $posts;
});

// Route::get('/findmore', function(){
//     // $posts = Post::findOrFail(1);
//     // return $posts;

//     $posts = Post::where('users_count', '<', 50)->firstOrFail();
//     return $posts;
// });

Route::get('/basicinsert', function(){
    $post = new Post;

    $post->title = 'New Eloquent title insert.';
    $post->content = 'Wow eloquent is really cool, look at this content.';

    $post->save();
});

// Route::get('/basicinsert2', function(){
//     $post = Post::find(2);

//     $post->title = 'New Eloquent title insert 2.';
//     $post->content = 'Wow eloquent is really cool, look at this content 2.';

//     $post->save();
// });

// Route::get('/create', function(){
//     Post::create(['title'=>'the create method', 'content'=>'WOW I\'am learning alot with Edwin Diaz']);
// });

// Route::get('/update', function(){
//     Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'New PHP Title', 'content'=>'I love my instructor Edwin']);
// });

Route::get('/delete', function(){
    $post = Post::find(10);

    $post->delete();
});

Route::get('/delete2', function(){
    // Post::destroy(3);

    Post::destroy([4,5]);
    // Post::where('is_admin', 0)->delete();

});

Route::get('/softdelete', function(){
    //
    Post::find(6)->delete();
});

Route::get('/readsoftdelete', function(){
    //
    // $post = Post::find(6);
    // return $post;

    // $post = Post::withTrashed()->where('id', 6)->get();
    // return $post;

    $post = Post::onlyTrashed()->where('id', 10)->get();
    return $post;
});

// Route::get('/restore', function(){
//     Post::withTrashed()->where('is_admin', 0)->restore();
// });

Route::get('/forcedelete', function(){

    Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
    // Post::withTrashed()->where('is_admin', 0)->forceDelete();
});