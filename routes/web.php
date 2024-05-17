<?php
use Myitedu\EmailServices\MyiteduController;
Route::get('/myitedu/testform', [MyiteduController::class, 'testform'])->name('myitedu.testform');
Route::get('/myitedu/formdata', [MyiteduController::class, 'formdata'])->name('myitedu.formdata');
