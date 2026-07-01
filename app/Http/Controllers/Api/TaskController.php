<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(private TaskService $service) {}

    public function index(Request $request)
    {
        $includes = $this->parseIncludes($request, ['developer']);

        return TaskResource::collection($this->service->list($includes));
    }

    public function store(StoreTaskRequest $request)
    {
        return new TaskResource($this->service->create($request->validated()));
    }

    public function show(Request $request, int $id)
    {
        $includes = $this->parseIncludes($request, ['developer']);
        $task = $this->service->find($id, $includes);

        if (! $task) {
            return $this->notFound('Task not found.');
        }

        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, int $id)
    {
        $task = $this->service->find($id, []);

        if (! $task) {
            return $this->notFound('Task not found.');
        }

        return new TaskResource($this->service->update($task, $request->validated()));
    }

    public function destroy(int $id)
    {
        $task = $this->service->find($id, []);

        if (! $task) {
            return $this->notFound('Task not found.');
        }

        $this->service->delete($task);

        return response()->json([
            'meta' => ['message' => 'Task deleted successfully.'],
        ]);
    }
}
