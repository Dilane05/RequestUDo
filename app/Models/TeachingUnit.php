<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingUnit extends Model
{
    use HasFactory;
    
    public function queries()
    {
        return $this->hasMany(Query::class,'type_query_id');
    }
}
