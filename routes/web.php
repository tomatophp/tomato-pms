<?php

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/projects', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
    Route::get('admin/projects/api', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'api'])->name('projects.api');
    Route::get('admin/projects/create', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
    Route::post('admin/projects', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
    Route::get('admin/projects/{model}', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');
    Route::get('admin/projects/{model}/edit', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('admin/projects/{model}', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
    Route::delete('admin/projects/{model}', [\TomatoPHP\TomatoPms\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy');
});
