<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    public function threadDetails()
    {
        return $this->hasMany(ThreadDetail::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
