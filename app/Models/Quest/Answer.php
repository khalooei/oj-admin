<?php

namespace App\Models\Quest;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    // author relation
    public function user()
    {
        return $this->belongsTo('App\Models\Access\User\User');
    }

    public function Quest(){
    		return $this->belongsTo('App\Models\Quest\ExerciseType\Quest', 'exercise_id');
    }

    public function Tutorial(){
    		return $this->belongsTo('App\Models\Quest\ExerciseType\Tutorial', 'exercise_id');
    }

    // public function Exercise(){
    // 		return $this->belongsTo('App\Models\Quest\Exercise');
    // }
}
