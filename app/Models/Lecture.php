<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Lecture extends Model
{
    use HasFactory;

    public $fillable = ['name', 'description'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'grades');
    }
}
