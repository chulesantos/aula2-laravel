<?php

Route::get('/series', 'SeriesController@index')
    ->name('listar_series');

Route::get('/series/criar', 'SeriesController@create');

Route::post('/series/criar', 'SeriesController@store')
    ->name('criar_serie');

Route::delete('/series/{id}', 'SeriesController@destroy')
    ->name('excluir_serie');

Route::get('series/{seriesId}/temporadas', 'TemporadasController@index');
