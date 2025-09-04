<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::query();

        // Aplicar filtros
        if (request('filters')) {
            $filters = request('filters');

            foreach ($filters as $field => $conditions) {
                foreach ($conditions as $operator => $value) {

                    if (in_array($operator, ['=', '!=', '<', '>', '<=', '>='])) {
                        $tasks->where($field, $operator, $value);
                    }

                    if ($operator == 'like') {
                        $tasks->where($field, 'like', "%{$value}%");
                    }
                }
            }
        }

        // Aplicar selects
        if (request('select')) {
            $select = request('select');
            $selectArray = explode(',', $select);

            $tasks->select($selectArray);
        }

        // Aplicar orden
        if (request('sort')) {
            $sortFields = explode(',', request('sort'));

            foreach ($sortFields as $sortField) {
                $direction = 'asc';

                if (substr($sortField, 0, 1) == '-') {
                    $direction = 'desc';
                    $sortField = substr($sortField, 1);
                }

                $tasks->orderBy($sortField, $direction);
            }
        }

        // Incluir relaciones
        if (request('include')) {
            $include = explode(',', request('include'));
            $tasks = $tasks->with($include);
        }

        // Crear consulta
        if (request('perPage')) {
            $tasks = $tasks->paginate(request('perPage'));
        } else {
            $tasks = $tasks->get();
        }

        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        /* $request->validate([
            'body' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id'
        ]); */

        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        /* $request->validate([
            'body' => 'required|string|max:255',
            'user_id' => 'nullable|integer|exists:users,id'
        ]); */

        $task->update($request->all());
        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}
