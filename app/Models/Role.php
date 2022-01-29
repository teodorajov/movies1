<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['role_name', 'main_role', 'movie_id', 'actor_id'];

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }
}
