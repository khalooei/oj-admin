<?php

/**
 * All route names are prefixed with 'admin.contest'.
 */
Route::group([
    'namespace'  => 'Contest',
], function () {

    /**
     * For CRUD
     */
    Route::resource('contest', 'ContestController');

    /**
     * For DataTables
     */
    Route::post('contest/get', 'ContestTableController')->name('contest.get');

    /**
     * For disable or enable contest
     */
    Route::post('contest/{contest}/enabled', 'ContestController@enabled')->name('contest.enabled');
});
