<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlackList extends Model
{
    //
    protected $fillable = [
        'category',
        'name',
        'compnay',
        'address',
        'position',
        'comment',
        'photo',
        'status',
        'applicant',
        'applicant_email'
    ];
}
