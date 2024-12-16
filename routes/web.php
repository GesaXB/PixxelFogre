<?php

use App\Livewire\ProjekList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/projeklist', ProjekList::class)->name('projek');

