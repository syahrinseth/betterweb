<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Course;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use App\Http\Resources\CourseResource;

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
        $course = Course::whereSlug($slug)->firstOrFail();
        $stripePriceId = $course->stripe_price_id;
        $quantity = 1;

        if (empty($stripePriceId)) {
            return abort(403);
        }

        return request()->user()->checkout([$stripePriceId => $quantity], [
            'success_url' => route('kelas.course.purchase.checkoutSuccess', [ 'slug' => $course->slug ]) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('kelas.course.purchase.checkoutCancel', [ 'slug' => $course->slug ]),
            'metadata' => ['course_id' => $course->id, 'user_id' => auth()->id()],
        ]);
    }

    public function checkoutSuccess(String $slug)
    {
        $sessionId = request()->get('session_id');

        if ($sessionId === null) {
            return abort(403);
        }
    
        $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);

        if ($session->payment_status !== 'paid') {
            return abort(403);
        }

        $courseId = $session['metadata']['course_id'] ?? null;

        $course = Course::findOrFail($courseId);

        $user_id = $session['metadata']['user_id'] ?? null;

        $course->purchasers()
            ->attach(
                User::find($user_id)
            );

        return Inertia::render('Kelas/Course/Checkout/Success', [
            'course' => new CourseResource(Course::whereId(1)->first())
        ]);

    }

    public function checkoutCancel(String $slug)
    {
        $course = Course::with(['tags', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();

        return Inertia::render('Kelas/Course/Checkout/Cancel', [
            'course' => new CourseResource($course)
        ]);
    }
}
