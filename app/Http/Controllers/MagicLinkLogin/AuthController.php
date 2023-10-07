<?php

namespace App\Http\Controllers\MagicLinkLogin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
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
        // Show login page
        return Inertia::render('MagicLinkLogin/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Send login link
        $validated = $request->validate([
            'email' => ['required', 'email']
        ]);

        $user = User::whereEmail($validated['email'])
            ->first();
        
        if (empty($user)) {
            $user = User::create($validated);
        }
        
        $user->sendLoginLink();

        return redirect()->back()->with('success', true);
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

    /**
     * Verify login by magic link.
     * @param Request $request
     * @param string $token
     * 
     * @return Response
     */
    public function verifyLogin(Request $request, $token)
    {
        $token = \App\Models\LoginToken::whereToken(hash('sha256', $token))->firstOrFail();
        abort_unless($request->hasValidSignature() && $token->isValid(), 401);
        $token->consume();
        $token->user->verifyUser();
        Auth::login($token->user, remember: true);
        return redirect('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('/'));
    }
}
