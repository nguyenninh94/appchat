<?php

use Illuminate\Http\Request;
use App\Events\MessageSent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', function() {
    return view('chat');
})->middleware('auth');

Route::get('/messages', function() {
	$messages = App\Message::with('user')->get();
	return response()->json($messages);
})->middleware('auth');

Route::post('/messages', function(Request $request) {
   $user = Auth::user();
   $message = $user->messages()->create([
      'message' => $request->input('message')
   ]);

   broadcast(new MessageSent($message, $user))->toOthers();

   return response()->json('Added message successfully!');
});

Route::get('/users', function() {
   $users = App\User::all();

   return response()->json($users);
})->middleware('auth');

/*Route::get('/status', function() {
	if(Auth::check())
	{
		return ['status' => 1];
	} else {
		return ['status' => 0];
	}
});*/

Auth::routes();

Route::get('/home', 'HomeController@index');
