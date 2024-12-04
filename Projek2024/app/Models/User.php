<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',  // Pastikan ada role untuk membedakan student, teacher, dll.
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi untuk kursus yang diajarkan oleh teacher
    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    // Relasi untuk kursus yang diikuti oleh student
    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'course_user', 'user_id', 'course_id');
    }

    // Relasi untuk progres yang dimiliki oleh student
    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    // Method untuk mengecek apakah user adalah teacher
    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    // Method untuk mengecek apakah user adalah student
    public function isStudent()
    {
        return $this->role === 'student';
    }
}
