<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use Inertia\Inertia;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with([
            'tags',
            'author'
        ])->paginate(request()->input('per_page') ?? 10);

        return Inertia::render('Course/Index', [
            'courses' => CourseResource::collection($courses)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $course = Course::with(['tags', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();
            
        return Inertia::render('Course/Show', [
            'course' => (new CourseResource($course))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
