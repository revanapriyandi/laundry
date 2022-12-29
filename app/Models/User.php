<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasProfilePhoto;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function getPesanan()
    {
        return $this->hasMany(Pesanan::class, 'user_id', 'id');
    }


    public function formatPhoneNumber()
    {
        $nomorhp = trim($this->phone);
        $nomorhp = strip_tags($nomorhp);
        $nomorhp = str_replace(" ", "", $nomorhp);
        $nomorhp = str_replace("(", "", $nomorhp);
        $nomorhp = str_replace(".", "", $nomorhp);
        $nomorhp = str_replace("+", "", $nomorhp);

        if (!preg_match('/[^0-9]/', trim($nomorhp))) {
            if (substr(trim($nomorhp), 0, 3) == '+62') {
                $nomorhp = trim($nomorhp);
            } elseif (substr($nomorhp, 0, 1) == '0') {
                $nomorhp = '62' . substr($nomorhp, 1);
            }
        }
        return $nomorhp;
    }

    public function routeNotificationForWhatsApp()
    {
        return $this->formatPhoneNumber();
    }
}
