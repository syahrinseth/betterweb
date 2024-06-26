<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Course;
use App\Models\Purchase;
use Illuminate\Support\Str;
use App\Mail\MagicLinkLogin;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function booted(): void
    {

        // Run the event when model is trying to insert data in database.
        static::creating(function(User $user) { 

            // Generate random password because we dont use password, but we use special link to register or login a user.
            // And assign a name for user based on user email add.
            $user->password = bcrypt(Str::random(10));
            $user->name = explode('@', $user->email)[0];

        });
        
    }

    public function sendLoginLink()
    {
        // Send login link
        $plaintext = Str::random(32);
        $token = $this->loginTokens()->create([
            'token' => hash('sha256', $plaintext),
            'expires_at' => now()->addMinutes(15),
            'callback_url' => !empty(request('callback_url')) ? request('callback_url') : (Route::is('kelas.*') ? route('kelas.index') : route('/'))
        ]);
        // Send email
        Mail::to($this->email)->queue(new MagicLinkLogin(
            $plaintext,
            $token->expires_at,
            Route::is('kelas.*') ? 'kelas.login.verifyLogin' : 'login.verifyLogin'
        ));
    }

    public function loginTokens()
    {
        return $this->hasMany(LoginToken::class);
    }

    public function verifyUser()
    {
        $this->email_verified_at = now();
        $this->update();
    }

    public function coursePurchases()
    {
        return $this->morphedByMany(Course::class, 'purchasable');
    }
}
