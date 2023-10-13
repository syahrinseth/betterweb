<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use Inertia\Inertia;
use App\Models\Course;
use Illuminate\Http\Request;

class PurchaseCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param String $slug
     * 
     * @return Inertia
     */
    public function index(String $slug)
    {
        return Inertia::render('Purchase/Index', [
            'course' => new CourseResource(
                Course::whereSlug($slug)->firstOrFail()
            )
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
