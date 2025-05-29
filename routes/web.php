<?php
/**
 * Hospital Integration API
 * Developed by Marcos Paulo Bez Birolo
 * Email: rockbez@hotmail.com
 */


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
