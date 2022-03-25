<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Success... API Working...
Route::any('/v1', function () {
    return response()->json(
        [
            'message' => 'api work fine... :)'
        ]
    );
});

// General API Routes
Route::prefix('v1')->group(function () {
    // Professionals
    Route::prefix('professional')->group(function () {
        Route::post('list', 'App\Http\Controllers\ProfessionalController@list');
    });

    // Specialities
    Route::prefix('specialties')->group(function () {
        Route::post('list', 'App\Http\Controllers\SpecialtyController@list');
    });

    // Patient
    Route::prefix('patient')->group(function () {
        Route::post('list-sources', 'App\Http\Controllers\PatientController@listSources');
        Route::post('appointment', 'App\Http\Controllers\PatientController@appointment');
    });
});
