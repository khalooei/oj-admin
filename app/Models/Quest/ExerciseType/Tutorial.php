<?php

namespace App\Models\Quest\ExerciseType;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutorial extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    // author relation
    public function user()
    {
        return $this->belongsTo('App\Models\Access\User\User');
    }
}
