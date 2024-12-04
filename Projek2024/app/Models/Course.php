<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'start_date', 'end_date', 'teacher_id', 'image'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students() {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }

}
