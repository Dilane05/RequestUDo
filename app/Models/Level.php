<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class,'level_id');
    }

}
