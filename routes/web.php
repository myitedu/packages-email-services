<?php
use Myitedu\EmailServices\MyiteduController;
Route::get('/myitedu/testform', [MyiteduController::class, 'testform'])->name('myitedu.testform');
