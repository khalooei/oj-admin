<?php

/**
 * All route names are prefixed with 'admin.access'.
 */
Route::group([
    'prefix'     => 'gamification',
    'as'         => 'gamification.',
    'namespace'  => 'Gamification',
], function () {

    /*
     * Gamification Management
     */
    Route::get('test', function() {
        return 0;
    });
});
