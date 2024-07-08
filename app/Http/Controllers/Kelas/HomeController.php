<?php

namespace App\Http\Controllers\Kelas;

use Inertia\Inertia;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (empty(auth()->id())) {
            return Inertia::render('Kelas/Index', [
                'courses' => fn () => CourseResource::collection(
                    Course::with(['tags', 'author', 'sections' => ['lessons']]
                )->paginate(
                    perPage: 15,
                    columns: ['*'],
                    pageName: 'courses'
                )),
            ]);
        }
        
        return Inertia::render('Kelas/LamanUtama', [
            'inProgress' => fn () => CourseResource::collection(
                Course::with(['tags', 'author', 'sections.lessons.completedItems'])
                    ->whereHas('sections.lessons.completedItems', function($query) {
                        $query->where('user_id', auth()->id());
                    })->paginate(
                        perPage: 15,
                        columns: ['*'],
                        pageName: 'in_progress'
                    )
            ),
            'courses' => fn () => CourseResource::collection(
                Course::with(['tags', 'author', 'sections' => ['lessons']]
            )->paginate(
                perPage: 15,
                columns: ['*'],
                pageName: 'courses'
            ))
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
    public function show(string $id)
    {
        //
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
