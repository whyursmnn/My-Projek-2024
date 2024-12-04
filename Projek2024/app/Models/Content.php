<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['course_id', 'title', 'body'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function progress() {
        return $this->hasMany(Progress::class);
    }

}
