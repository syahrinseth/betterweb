<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateLessonRequest;
use Inertia\Inertia;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Resources\CourseResource;
use App\Http\Resources\LessonResource;
use App\Services\CourseLessonService;

class LessonController extends Controller
{
    public CourseLessonService $service;

    public function __construct()
    {
        $this->service = new CourseLessonService(request('id'));
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $slug, int $id)
    {
        $course = Course::whereSlug($slug)
            ->with([
                'sections' => [
                    'lessons'
                ]
            ])
            ->firstOrFail();

        $lesson = Lesson::findOrFail($id);

        return Inertia::render('Kelas/Course/Lesson/Show', [
            'course' => new CourseResource($course),
            'lesson' => new LessonResource($lesson)
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
    public function update(UpdateLessonRequest $request, string $id)
    {
        $validated = $request->validated();

        if (!empty($validated['completed'])) {
            if ($validated['completed'] == true) {
                $this->service->markAsComplete();
            } else {
                $this->service->markAsIncomplete();
            }
        }

        return redirect()->back()->with('success', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
