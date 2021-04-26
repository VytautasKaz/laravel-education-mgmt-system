<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lecture;

class Student extends Model
{
    use HasFactory;

    public $fillable = ['name', 'surname', 'email', 'phone'];

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class);
    }
}
