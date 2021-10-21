<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('fileUpload');
});

Route::post('upload', function () {

	request()->file('file')->store(
		'my-file',
		's3'
	);

	return back();

})->name('upload');

