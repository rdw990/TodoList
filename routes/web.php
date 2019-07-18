<?php

Route::get('/', function () {
    return view('testPages.index');
});

Route::get('/about', function(){
  return view('testPages.about');
});

Route::get('/contact', function(){
  return view('testPages.contact');
});


Route::resource('/todos', 'TodosController');