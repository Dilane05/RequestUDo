<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function type_query()
    {
        return $this->belongsTo(TypeQuery::class);
    }

    public function teaching_unit()
    {
        return $this->belongsTo(TeachingUnit::class);
    }


}
