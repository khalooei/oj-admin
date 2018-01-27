<?php

namespace App\Models\Quest;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    // author relation
    public function user()
    {
        return $this->belongsTo('App\Models\Access\User\User');
    }

    public function AnswerOfQuest()
    {
        return $this->hasMany('App\Models\Quest\Answer');
    }

    
}
