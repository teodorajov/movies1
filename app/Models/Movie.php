<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'duration', 'rating', 'description', 'release_year'];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}
