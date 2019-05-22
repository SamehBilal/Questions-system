<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mcq extends Model
{

    protected $table = 'mcq';
    protected $fillable = [
        'Question', 'Ans1', 'Ans2', 'Ans3', 'Ans4','Correct',
    ];
}
