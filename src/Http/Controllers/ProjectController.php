<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class ProjectController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \App\Models\Project::class;
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
            view: 'admin.projects.index',
            table: \App\Tables\ProjectTable::class
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
            model: \App\Models\Project::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'admin.projects.create',
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
            model: \App\Models\Project::class,
            validation: [
                            'user_id' => 'required|exists:users,id',
            'approved_by' => 'nullable',
            'project_leader_id' => 'required|exists:users,id',
            'default_assignee_id' => 'nullable|exists:users,id',
            'account_id' => 'nullable|exists:accounts,id',
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|max:255|string',
            'view' => 'nullable|max:255|string',
            'status' => 'nullable|max:255|string',
            'key' => 'required|max:255|string',
            'url' => 'nullable|max:255|string',
            'description' => 'nullable',
            'body' => 'nullable',
            'icon' => 'nullable|max:255',
            'color' => 'nullable|max:255',
            'type' => 'nullable|max:255|string',
            'currency' => 'nullable|max:255|string',
            'rate' => 'nullable',
            'rate_per' => 'nullable|max:255|string',
            'total' => 'nullable',
            'is_activated' => 'nullable',
            'is_started' => 'nullable',
            'is_done' => 'nullable'
            ],
            message: __('Project updated successfully'),
            redirect: 'admin.projects.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \App\Models\Project $model
     * @return View|JsonResponse
     */
    public function show(\App\Models\Project $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'admin.projects.show',
        );
    }

    /**
     * @param \App\Models\Project $model
     * @return View
     */
    public function edit(\App\Models\Project $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'admin.projects.edit',
        );
    }

    /**
     * @param Request $request
     * @param \App\Models\Project $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \App\Models\Project $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                            'user_id' => 'sometimes|exists:users,id',
            'approved_by' => 'nullable',
            'project_leader_id' => 'sometimes|exists:users,id',
            'default_assignee_id' => 'nullable|exists:users,id',
            'account_id' => 'nullable|exists:accounts,id',
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'sometimes|max:255|string',
            'view' => 'nullable|max:255|string',
            'status' => 'nullable|max:255|string',
            'key' => 'sometimes|max:255|string',
            'url' => 'nullable|max:255|string',
            'description' => 'nullable',
            'body' => 'nullable',
            'icon' => 'nullable|max:255',
            'color' => 'nullable|max:255',
            'type' => 'nullable|max:255|string',
            'currency' => 'nullable|max:255|string',
            'rate' => 'nullable',
            'rate_per' => 'nullable|max:255|string',
            'total' => 'nullable',
            'is_activated' => 'nullable',
            'is_started' => 'nullable',
            'is_done' => 'nullable'
            ],
            message: __('Project updated successfully'),
            redirect: 'admin.projects.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \App\Models\Project $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\App\Models\Project $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Project deleted successfully'),
            redirect: 'admin.projects.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
