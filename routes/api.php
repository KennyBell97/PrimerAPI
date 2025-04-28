
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;


Route::get('/alumnos', [AlumnoController::class, 'index']);
Route::post('/alumnos', [AlumnoController::class, 'store']);

// Middleware aplicado a todos los ids
Route::middleware(['CheckAlumnoId'])->group(function () {
    Route::get('/alumnos/{id}', [AlumnoController::class, 'show']);
    Route::put('/alumnos/{id}', [AlumnoController::class, 'update']);
    Route::delete('/alumnos/{id}', [AlumnoController::class, 'delete']);
});



