<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])
    ->prefix('usermanagement')
    ->group(function () {
        Route::get('/', 
            [\Modules\UserManagement\Http\Controllers\UserManagementController::class, 'index']
        );
    });