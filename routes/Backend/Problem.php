<?php

/**
 * All route names are prefixed with 'admin.problem'.
 */
Route::group([
    'namespace'  => 'Problem',
], function () {

    /**
     * For CRUD
     */
    Route::resource('problem', 'ProblemController');

    /**
     * For DataTables
     */
    Route::post('problem/get', 'ProblemTableController')->name('problem.get');

    /**
     * For disable or enable problem
     */
    // Route::post('problem/{problem}/enabled', 'ProblemController@enabled')->name('problem.enabled');
});
