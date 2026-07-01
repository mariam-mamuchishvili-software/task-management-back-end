<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;
use App\Http\Resources\DeveloperResource;
use App\Services\DeveloperService;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function __construct(private DeveloperService $service) {}

    public function index(Request $request)
    {
        $includes = $this->parseIncludes($request, ['tasks']);

        return DeveloperResource::collection($this->service->list($includes));
    }

    public function store(StoreDeveloperRequest $request)
    {
        return new DeveloperResource($this->service->create($request->validated()));
    }

    public function show(Request $request, int $id)
    {
        $includes = $this->parseIncludes($request, ['tasks']);
        $developer = $this->service->find($id, $includes);

        if (! $developer) {
            return $this->notFound('Developer not found.');
        }

        return new DeveloperResource($developer);
    }

    public function update(UpdateDeveloperRequest $request, int $id)
    {
        $developer = $this->service->find($id, []);

        if (! $developer) {
            return $this->notFound('Developer not found.');
        }

        return new DeveloperResource($this->service->update($developer, $request->validated()));
    }

    public function destroy(int $id)
    {
        $developer = $this->service->find($id, []);

        if (! $developer) {
            return $this->notFound('Developer not found.');
        }

        $this->service->delete($developer);

        return response()->json([
            'meta' => ['message' => 'Developer deleted successfully.'],
        ]);
    }
}
