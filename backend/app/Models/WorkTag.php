<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class WorkTag extends Pivot
{
    protected $fillable = [
        'work_id',
        'tag_id'
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
    
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
