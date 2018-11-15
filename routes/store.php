<?php

Route::get('/home1', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('store')->user();

    //dd($users);

    return view('store.home');
})->name('home1');

