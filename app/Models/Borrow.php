<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    public function borrowDetails()
    {
        return $this->hasMany(BorrowDetail::class);
    }
}
