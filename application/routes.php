<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/
Route::controller('pages'); 
Route::get('/',array('as'=>'articles','uses'=>'pages@articles'));

Route::get('hakkimizda',array('as'=>'hakkimizda','uses'=>'pages@hakkimizda'));
Route::get('hizmetlerimiz',array('as'=>'hizmetlerimiz','uses'=>'pages@hizmetlerimiz'));
Route::get('neurofeedback',array('as'=>'neurofeedback','uses'=>'pages@neurofeedback'));
Route::get('biofeedback',array('as'=>'biofeedback','uses'=>'pages@biofeedback'));
Route::get('iletisim',array('as'=>'iletisim','uses'=>'pages@iletisim'));
Route::get('harita',array('as'=>'harita','uses'=>'pages@harita'));
Route::get('haberler',array('as'=>'haberler','uses'=>'pages@haberler'));
Route::get('galeri',array('as'=>'galeri','uses'=>'pages@galeri'));

Route::get('view/(:num)', function($post) {
	$post = Post::find($post);
	return View::make('pages.full')
	->with('post', $post);
});
Route::get('post/(:num)', array('before'=> 'auth', 'do' => function($post) {
	$user = Auth::user();
	$post = Post::find($post);
	return View::make('pages.edit')->with('post', $post)->with('user', $user);
}));  
Route::put('post/(:num)', array('before'=> 'auth', 'do' => function($post) {
	$title = Input::get('title');
	$body = Input::get('body');
	$edit_post = array(
        'title'    => $title,
        'body'     => $body
         
    );
    $rules = array(
'title' => 'required|min:3|max:128',
'body' => 'required'
);
// make the validator
$v = Validator::make($edit_post, $rules);
if ( $v->fails() )
{
// redirect back to the form with
// errors, input and our currently
// logged in user
return Redirect::to('admin')
->with('user', Auth::user())
->with_errors($v)
->with_input();
} 
      // save the post after passing validation
    $post = Post::with('user')->find($id);
    $post->title = $title;
    $post->body = $body;
    $post->save();
    return Redirect::to('view/'.$post->id);
}));

Route::delete('post/(:num)', array('before' => 'auth', 'do' => function($post){
	$user = Auth::user();
    $delete_post =  Post::find($post);
    $delete_post -> delete();
    return Redirect::to('/')
            ->with('success_message', true);
})) ;




Route::get('admin', array('before' => 'auth', 'do' => function() {
$user = Auth::user();
return View::make('pages.new')->with('user', $user);
}));

Route::post('admin', function() {
// let's get the new post from the POST data
// this is much safer than using mass assignment
$new_post = array(
'title' => Input::get('title'),
'body' => Input::get('body'),
'author_id' => Input::get('author_id')
);

   
// let's setup some rules for our new data
// I'm sure you can come up with better ones
$rules = array(
'title' => 'required|min:3|max:128',
'body' => 'required'
);
// make the validator
$v = Validator::make($new_post, $rules);
if ( $v->fails() )
{
// redirect back to the form with
// errors, input and our currently
// logged in user
return Redirect::to('admin')
->with('user', Auth::user())
->with_errors($v)
->with_input();
}
// create the new post
$post = new Post($new_post);
$post->save();

// redirect to viewing our new post
return Redirect::to('view/'.$post->id);
});

//edit the post 

 
Route::get('resizer', array('before' => 'auth', 'do' => function() {
$user = Auth::user();
return View::make('pages.resizer')->with('user', $user);
}));
Route::post('resizer', function() {
$img = Input::file('picture');
 
// Save a thumbnail
	 $success = Resizer::open( $img )
	->resize( 200 , 200 , 'crop' )
  ->save( 'images/my-new-filename.jpg' , 90 );
if ( $success ) {
 echo $success;
echo 'woohoo';
} else {
echo 'lame';
}
});

Route::get('login', function() {
  return View::make('pages.login');
});
Route::post('login', function() {
$userdata = array(
'username' => Input::get('username'),
'password' => Input::get('password')
);
if ( Auth::attempt($userdata) )
{
return Redirect::to('admin');
}
else
{
return Redirect::to('login')
->with('login_errors', true);
}
});
Route::get('logout', function() {
		 Auth::logout();
		return Redirect::to('/');
});
Route::get('heroes',array('uses'=>'pages@heroes'));
/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});
