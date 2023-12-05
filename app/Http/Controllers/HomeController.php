<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Course;

class HomeController extends Controller
{
    public function index(): Response
    {
        $courses = Course::with(['author', 'tags'])
            ->paginate(4);
            
        return Inertia::render('Welcome', [
            'courses' => $courses
        ]);
    }
}
