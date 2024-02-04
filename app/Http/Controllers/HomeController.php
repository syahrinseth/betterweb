<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Course;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Welcome');
    }
}
