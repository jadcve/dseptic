<?php

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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);



$router->group(['middleware' => 'auth','prefix' => 'admin'], function() {
    Route::get('/home', 'AdminController@index');
    Route::post('/send', ['as' => 'send', 'uses' => 'MailController@send'] );
    Route::get('/contact', ['as' => 'contact', 'uses' => 'MailController@index'] );
    Route::resource('ticket', 'TicketController');
    Route::get('ticket_rejected', 'TicketController@ticket_rejected');
    
    Route::get('/auth/register', 'AdminController@getRegister');
    Route::get('/user_list', 'AdminController@listRegister');
    Route::get('/message_list', 'MessageController@index');
    Route::get('/message/{ticket}', 'MessageController@accept');
    Route::post('/message_update', 'MessageController@message_update');
    Route::post('/auth/register', ['as' => 'auth/register', 'uses' => 'AdminController@postRegister']);  
    
});

$router->group(['middleware' => 'operator','prefix' => 'operator'], function() {
    Route::get('/home', 'OperatorController@index');
    Route::get('/ticket/list', 'OperatorController@ticket_list');
    Route::get('/ticket/list_accepted', 'OperatorController@ticket_listaccepted');
    Route::get('/ticket/list_process', 'OperatorController@ticket_listprocess');
    Route::get('/ticket/list_closed', 'OperatorController@ticket_listclosed');
    Route::get('/ticket/list_assigned', 'OperatorController@ticket_listassigned');
    Route::get('/ticket/accept/{ticket}', 'OperatorController@accept');
    Route::get('/ticket/process/{ticket}', 'OperatorController@process');
    Route::get('/user_info', 'OperatorController@user_info');
    Route::post('/user_update', 'OperatorController@user_update');
    Route::post('/validate_password', 'OperatorController@validate_password');
    Route::post('/ticket/process/{ticket}', 'OperatorController@update_ticket');
//    Route::post('/ticket/process', 'OperatorController@update_ticket');
    Route::post('/ticket/accept', 'OperatorController@accept_store');
    Route::get('/message_list', 'MessageController@message_operator');
    Route::get('/message/{ticket}', 'MessageController@accept_operator');
    Route::post('/message_updatecliente', 'MessageController@message_updateoperator');
});

Route::post('/text', function()
{
  // Get form inputs
  $number = '+584247143040';
  $message = 'Probando app';
 
  // Create an authenticated client for the Twilio API
  $client = new Services_Twilio('ACa0ad8e4a3ed2748ec5ab2cc5b3b40348', '7a498f8fd34e6e207c43efc89b922e8c');
 
  // Use the Twilio REST API client to send a text message
  $m = $client->account->messages->sendMessage(
   '+4915735983164', // the text will be sent from your Twilio number
    $number, // the phone number the text will be sent to
    $message // the body of the text message
  );
    // Return the message object to the browser as JSON
  return $m;
});

