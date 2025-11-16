<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['criteria_id', 'type', 'question_text'];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
