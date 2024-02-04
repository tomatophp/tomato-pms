<?php



Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/projects', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('projects.index');
    Route::get('admin/projects/api', [App\Http\Controllers\Admin\ProjectController::class, 'api'])->name('projects.api');
    Route::get('admin/projects/create', [App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('projects.create');
    Route::post('admin/projects', [App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('projects.store');
    Route::get('admin/projects/{model}', [App\Http\Controllers\Admin\ProjectController::class, 'show'])->name('projects.show');
    Route::get('admin/projects/{model}/edit', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('admin/projects/{model}', [App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('projects.update');
    Route::delete('admin/projects/{model}', [App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('projects.destroy');
});
