<?php

namespace App\Models;

use App\Models\Query;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeQuery extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function queries()
    {
        return $this->hasMany(Query::class,'type_query_id');
    }

}
