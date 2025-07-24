<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image_url',
        'bio',
        'github_url',
        'linkedin_url',
        'x_url',
    ];

    protected $appends = [
        'authority_detail_nos',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function getAuthorityDetailNosAttribute()
    {
        $list = [];
        $authorityDetail = optional($this->authority)->authorityDetails
        ?->pluck('detail_no', 'detail_no') ?? collect();
        foreach (config('model.authorityDetailNo') as $key => $val) {
            if ($authorityDetail->has($key)) {
                $list = $key;
            } 
        }

        return $list;
    }
}
