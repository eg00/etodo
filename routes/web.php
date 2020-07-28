<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false
]);

Route::prefix('old')->group(function () {
    Route::resource('tasks', 'TaskController')->except(['create', 'show', 'destroy']);
//Route::redirect('/', 'org');
});

Route::get('org', 'OrgController');

Route::get('/{any}', fn() => view('layouts.spa'))->where('any', '.*');
