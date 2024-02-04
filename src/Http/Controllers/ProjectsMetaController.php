<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class ProjectsMetaController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \App\Models\ProjectsMeta::class;
    }

    /**
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'admin.projects-metas.index',
            table: \App\Tables\ProjectsMetaTable::class
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: \App\Models\ProjectsMeta::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'admin.projects-metas.create',
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \App\Models\ProjectsMeta::class,
            validation: [
                            'project_id' => 'required|exists:projects,id',
            'key' => 'required|max:255|string',
            'value' => 'nullable',
            'type' => 'nullable|max:255|string',
            'group' => 'nullable|max:255|string'
            ],
            message: __('ProjectsMeta updated successfully'),
            redirect: 'admin.projects-metas.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \App\Models\ProjectsMeta $model
     * @return View|JsonResponse
     */
    public function show(\App\Models\ProjectsMeta $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'admin.projects-metas.show',
        );
    }

    /**
     * @param \App\Models\ProjectsMeta $model
     * @return View
     */
    public function edit(\App\Models\ProjectsMeta $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'admin.projects-metas.edit',
        );
    }

    /**
     * @param Request $request
     * @param \App\Models\ProjectsMeta $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \App\Models\ProjectsMeta $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                            'project_id' => 'sometimes|exists:projects,id',
            'key' => 'sometimes|max:255|string',
            'value' => 'nullable',
            'type' => 'nullable|max:255|string',
            'group' => 'nullable|max:255|string'
            ],
            message: __('ProjectsMeta updated successfully'),
            redirect: 'admin.projects-metas.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \App\Models\ProjectsMeta $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\App\Models\ProjectsMeta $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('ProjectsMeta deleted successfully'),
            redirect: 'admin.projects-metas.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
