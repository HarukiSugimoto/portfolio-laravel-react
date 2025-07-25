<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tags');
    }

    public function works()
    {
        return $this->belongsToMany(Work::class, 'work_tags');
    }
}
