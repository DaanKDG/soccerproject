<?php



Route::redirect('/', '/contacts');
Route::resource('contacts','ContactsController');
Auth::routes();



