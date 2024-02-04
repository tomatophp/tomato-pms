<?php

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/projects', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
    Route::get('admin/projects/api', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'api'])->name('projects.api');
    Route::get('admin/projects/create', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
    Route::post('admin/projects', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
    Route::get('admin/projects/{model}', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');
    Route::get('admin/projects/{model}/edit', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
    Route::get('admin/projects/{model}/permissions', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'permissions'])->name('projects.permissions');
    Route::get('admin/projects/{model}/description', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'description'])->name('projects.description');
    Route::get('admin/projects/{model}/status', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'status'])->name('projects.status');
    Route::get('admin/projects/{model}/rates', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'rates'])->name('projects.rates');
    Route::post('admin/projects/{model}', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
    Route::delete('admin/projects/{model}', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy');
});
