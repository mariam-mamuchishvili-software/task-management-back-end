<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;
use App\Http\Resources\DeveloperResource;
use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index(Request $request)
    {
        $includes = $this->parseIncludes($request, ['tasks']);

        $developers = Developer::with($includes)->get();

        return DeveloperResource::collection($developers);
    }

    public function store(StoreDeveloperRequest $request)
    {
        $developer = Developer::create($request->validated());

        return new DeveloperResource($developer);
    }

    public function show(Developer $developer)
    {
        return new DeveloperResource($developer);
    }

    public function update(UpdateDeveloperRequest $request, Developer $developer)
    {
        $developer->update($request->validated());

        return new DeveloperResource($developer);
    }

    public function destroy(Developer $developer)
    {
        $developer->delete();

        return response()->noContent();
    }

    private function parseIncludes(Request $request, array $allowed): array
    {
        $requested = array_filter(explode(',', $request->query('include', '')));
        return array_values(array_intersect($requested, $allowed));
    }
}
