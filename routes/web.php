<?php

use App\Http\Controllers\Web\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('articles.index'));

Route::resource('articles', ArticleController::class);
