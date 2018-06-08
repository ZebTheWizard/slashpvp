<?php

use App\Mail\ContactRequest;
use Illuminate\Http\Request;
// Route::any('register', function(){
//   abort(404);
// });
Auth::routes();



Route::get('/', function () {
    return view('welcome', [
      "socials" => \App\Social::get()
    ]);
});

Route::get('/contact', function () {
  return view('contact');
});

Route::post('/contact', function (Request $r) {
  $r->validate([
    "name" => "required",
    "email" => "required|email",
    "message" => "required"
  ]);
  if (env('APP_DEMO')) {
    Mail::to($r->email)->send(new ContactRequest($r->all()));
  } else {
    Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactRequest($r->all()));
  }

  return back();
});

Route::get('/updates', function () {
  return view('updates', [
    "updates" => \App\Update::get(),
  ]);
});

Route::post('/update/create', 'UpdatesController@create');
Route::post('/update/delete', 'UpdatesController@remove');

Route::post('/social/create', 'SocialsController@create');
Route::post('/social/delete', 'SocialsController@remove');


Route::get('/home', 'HomeController@index')->name('home');
